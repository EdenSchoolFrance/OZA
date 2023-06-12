<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pack;
use App\Models\SdRestraintArchived;
use App\Models\SdRisk;
use App\Models\SdWorkUnit;
use App\Models\User;
use App\Models\Client;
use App\Models\Danger;
use App\Models\SdDanger;
use Illuminate\Http\Request;
use App\Models\SingleDocument;
use App\Http\Controllers\Controller;
use App\Models\SdPsychosocialGroup;

class SingleDocumentController extends Controller
{
    public function index()
    {
        $page = [
            'title' => 'Liste des DU',
            'sidebar' => 'clients',
            'sub_sidebar' => 'single_document',
        ];

        $single_documents = SingleDocument::with('client');
        $clients = Client::all();

        if ($filter = request('filter')) {
            if (!empty($filter['du'])) {
                $single_documents->filterByName($filter['du']);
            }

            if (!empty($filter['status'])) {
                $single_documents->filterByStatus($filter['status']);
            }
        }

        $single_documents = $single_documents->get();
        return view('admin.single_document.index', compact('page', 'single_documents', 'filter', 'clients'));
    }

    public function store(Request $request, Client $client)
    {
        $request->validate([
            'name_single_document' => 'required',
            'number_ut' => 'required|integer|min:0',
            'dangers' => 'required|array',
            'dangers.*' => 'exists:dangers,id',
            'risk_psycho' => 'required',
            'risk_psycho_exposition_groups' => 'required_if:risk_psycho,yes|array',
            'risk_psycho_exposition_groups.*' => 'required',
            'risk_chemical' => 'required',
            'risk_explosion' => 'required',
        ]);

        $users = User::where('client_id', $client->id)->whereHas('role', function ($q) {
            $q->where('permission', 'ADMIN');
        })->get();

        $single_document = new SingleDocument();
        $single_document->id = uniqid();
        $single_document->name = $request->name_single_document;
        if ($request->risk_psycho == 'yes') {
            $single_document->risk_psycho = true;
        }
        if ($request->risk_chemical == 'yes') {
            $single_document->risk_chemical = true;
        }
        if ($request->risk_explosion == 'yes') {
            $single_document->risk_explosion = true;
        }
        $single_document->work_unit_limit = $request->number_ut;
        $single_document->client()->associate($client);
        $single_document->save();
        foreach ($users as $user) {
            $single_document->users()->attach($user);
        }

        foreach ($request->dangers as $danger) {
            $sd_danger = new SdDanger();
            $sd_danger->id = uniqid();
            $sd_danger->single_document()->associate($single_document);
            $sd_danger->danger()->associate($danger);
            $sd_danger->save();
        }

        if ($single_document->risk_psycho) {
            foreach ($request->risk_psycho_exposition_groups as $risk_psycho_exposition_group) {
                $sdPsychosocialGroup = new SdPsychosocialGroup();
                $sdPsychosocialGroup->id = uniqid();
                $sdPsychosocialGroup->name = $risk_psycho_exposition_group;
                $sdPsychosocialGroup->single_document()->associate($single_document);
                $sdPsychosocialGroup->save();
            }
        }

        return back()->with('status', 'Le document unique a bien été créé !');
    }

    public function edit(Client $client, SingleDocument $single_document)
    {
        $page = [
            'title' => 'Modification du document unique : ' . $single_document->name,
            'sidebar' => 'clients',
            'sub_sidebar' => 'single_document',
        ];

        $dangers = Danger::all()->sortBy('name');
        $packs = Pack::all();

        $sd = $single_document;

        $import = true;
        if (count($single_document->work_unit) === 0){
            $import = false;
        }

        $excelErrors = $sd->errors_excel;
        if (isset($excelErrors[0])){
            return view('admin.single_document.edit', compact('page', 'sd', 'dangers', 'packs', 'import','excelErrors'));
        }else{
            return view('admin.single_document.edit', compact('page', 'sd', 'dangers', 'packs', 'import'));
        }
    }

    public function update(Request $request, Client $client, SingleDocument $single_document)
    {
        $request->validate([
            'name_single_document' => 'required',
            'number_ut' => 'required|integer|min:0',
            'dangers' => 'required|array',
            'dangers.*' => 'exists:dangers,id',
            'risk_psycho' => 'required',
            'risk_psycho_exposition_groups' => 'required_if:risk_psycho,yes|array',
            'risk_psycho_exposition_groups.*' => 'required',
            'risk_chemical' => 'required',
            'risk_explosion' => 'required',
        ]);

        $single_document->name = $request->name_single_document;
        $single_document->work_unit_limit = $request->number_ut;

        if ($request->risk_psycho == 'yes') {
            $single_document->risk_psycho = true;
        } else {
            $single_document->risk_psycho = false;
        }
        if ($request->risk_chemical == 'yes') {
            $single_document->risk_chemical = true;
        } else {
            $single_document->risk_chemical = false;
        }
        if ($request->risk_explosion == 'yes') {
            $single_document->risk_explosion = true;
        } else {
            $single_document->risk_explosion = false;
        }
        $single_document->save();

        $dangers = SdDanger::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $dangers_request = $request->dangers;

        foreach ($dangers as $danger) {
            if (in_array($danger->danger_id, $dangers_request)) {
                unset($dangers_request[$danger->danger_id]);
            } else {
                $danger->delete();
            }
        }

        foreach ($dangers_request as $danger) {
            $sd_danger = new SdDanger();
            $sd_danger->id = uniqid();
            $sd_danger->single_document()->associate($single_document);
            $sd_danger->danger()->associate($danger);
            $sd_danger->save();
        }

        if ($single_document->risk_psycho) {
            $risk_psycho_groups_request = $request->risk_psycho_exposition_groups;

            foreach ($single_document->psychosocial_groups as $psychosocial_group) {
                if (array_key_exists($psychosocial_group->id, $risk_psycho_groups_request)) {
                    $psychosocial_group->name = $risk_psycho_groups_request[$psychosocial_group->id];
                    unset($risk_psycho_groups_request[$psychosocial_group->id]);
                } else {
                    $psychosocial_group->delete();
                }
            }

            foreach ($risk_psycho_groups_request as $item) {
                $sdPsychosocialGroup = new SdPsychosocialGroup();
                $sdPsychosocialGroup->id = uniqid();
                $sdPsychosocialGroup->name = $item;
                $sdPsychosocialGroup->single_document()->associate($single_document);
                $sdPsychosocialGroup->save();
            }
        } else {
            foreach ($single_document->psychosocial_groups as $psychosocial_group) {
                $psychosocial_group->delete();
            }
        }

        return back()->with('status', 'Le document unique a bien été mis à jour !');
    }

    public function archive(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $single_document = SingleDocument::find($request->id);

        if ($single_document) {
            $single_document->archived = true;
            $single_document->save();
        }

        return back()->with('status', 'Le document unique a bien été archivé !');
    }

    public function unarchive(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $single_document = SingleDocument::find($request->id);

        if ($single_document) {
            $single_document->archived = false;
            $single_document->save();
        }

        return back()->with('status', 'Le document unique a bien été désarchivé !');
    }

    public function delete(Client $client, SingleDocument $single_document)
    {
        $single_document->delete();

        return redirect()->route('admin.client.edit', [$client->id, 'tab' => 'du'])->with('status', 'Le document unique a bien été supprimé !');
    }

    public function duplicate(Request $request){

        $request->validate([
            'id' => 'required',
            'single_document_name' => 'required',
            'client_select' => 'required'
        ]);

        $client = Client::find($request->client_select);

        $single_document = SingleDocument::find($request->id);

        if (!$client || !$single_document) return back()->with('status','Un problème est survenue')->with('status_type','danger');

        $new_single_document = $single_document->replicate();
        $new_single_document->id = uniqid();
        $new_single_document->name = $request->single_document_name;
        $new_single_document->client()->associate($client);
        $new_single_document->save();

        $old_work_unit = [];
        $old_risk = [];

        foreach ($single_document->work_unit as $sd_work_unit){
            $new_sd_work_unit = $sd_work_unit->replicate();
            $new_sd_work_unit->id = uniqid();
            $new_sd_work_unit->single_document()->associate($new_single_document);
            $new_sd_work_unit->save();

            if ($sd_work_unit->sd_dangers){
                $old_work_unit[$sd_work_unit->id]['new_work_unit'] = $new_sd_work_unit->id;
                foreach ($sd_work_unit->sd_dangers as $sd_work_unit_sd_danger){
                    $old_work_unit[$sd_work_unit->id][$sd_work_unit_sd_danger->id] = $sd_work_unit_sd_danger->exist;
                }
            }


            foreach ($sd_work_unit->activities as $sd_activitie){
                $new_sd_activitie = $sd_activitie->replicate();
                $new_sd_activitie->id = uniqid();
                $new_sd_activitie->work_unit()->associate($new_sd_work_unit);
                $new_sd_activitie->save();
            }

            foreach ($sd_work_unit->items as $sd_item){

                $new_sd_item = $sd_item->replicate();
                $new_sd_item->id = uniqid();
                $new_sd_item->sub_item()->associate($sd_item->sub_item);
                $new_sd_item->sd_work_unit()->associate($new_sd_work_unit);
                $new_sd_item->save();
            }

            foreach ($sd_work_unit->sd_risks as $sd_risk){
                $old_risk[$sd_risk->id]['new_work_unit'] = $new_sd_work_unit->id;
                $old_risk[$sd_risk->id]['old_work_unit'] = $sd_work_unit->id;
            }
        }


        foreach ($single_document->dangers as $sd_danger){

            $new_sd_danger = $sd_danger->replicate();
            $new_sd_danger->id = uniqid();
            $new_sd_danger->single_document()->associate($new_single_document);
            $new_sd_danger->danger()->associate($sd_danger->danger);
            $new_sd_danger->save();

            if ($sd_danger->sd_works_units){
                foreach ($sd_danger->sd_works_units as $sd_danger_sd_work_unit){
                    if ($old_work_unit[$sd_danger_sd_work_unit->id]){
                        $new_sd_danger->sd_works_units()->attach($old_work_unit[$sd_danger_sd_work_unit->id]['new_work_unit'], ['exist' => $old_work_unit[$sd_danger_sd_work_unit->id][$sd_danger->id] ]);
                    }
                }
            }

            foreach ($sd_danger->sd_risk as $sd_risk){

                $new_sd_risk = $sd_risk->replicate();
                $new_sd_risk->id = uniqid();
                $new_sd_risk->sd_danger()->associate($new_sd_danger);

                if (isset($old_risk[$sd_risk->id])){
                    $new_sd_risk->sd_work_unit()->associate($old_risk[$sd_risk->id]['new_work_unit']);
                }
                $new_sd_risk->save();

                foreach ($sd_risk->sd_restraints as $sd_restraint){
                    $new_sd_restraint = $sd_restraint->replicate();
                    $new_sd_restraint->id = uniqid();
                    $new_sd_restraint->sd_risk()->associate($new_sd_risk);
                    $new_sd_restraint->save();
                }
            }

        }

        return back()->with('status','Document unique dupliqué avec succès');
    }
}
