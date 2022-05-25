<?php

namespace App\Http\Controllers;

use App\Models\Historie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HistorieController extends Controller
{
    public function store(Request $request, $id){

        $single_document = $this->checkSingleDocument($id);

        $request->validate([
            'work_history' => 'required'
        ]);

        $history = new Historie();
        $history->id = uniqid();
        $history->work = $request->work_history;
        $history->date = date("Y-m-d");
        $history->user()->associate(Auth::user());
        $history->single_document()->associate($single_document);
        $history->save();


        return redirect()->route('pdf.view', [$single_document->id])->with('status',$history->id);
    }

    public function delete(Request $request, $id)
    {

        $single_document = $this->checkSingleDocument($id);

        $request->validate([
            'id' => 'required'
        ]);

        $historie = Historie::find($request->id);

        if (!$historie) {
            return back()->with('status','Un problème est survenue')->with('status_type','danger');
        }

        if(Storage::exists('/private/'.$single_document->client->id.'/du/'.$historie->id.'.pdf')) {
            Storage::delete('/private/'.$single_document->client->id.'/du/'.$historie->id.'.pdf');
        }

        $historie->delete();

        return back()->with('status', 'Une version historique de ce document unique a bien été supprimé !');
    }

    public function download($id, $historical_id){

        $single_document = $this->checkSingleDocument($id);

        $historical = Historie::where('id', $historical_id)->whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->first();

        if (!$historical) {
            return back()->with('status','Un problème est survenue')->with('status_type','danger');
        }
        date_default_timezone_set('Europe/Paris');
        $name = 'OzaDocumentUnique_'.$single_document->client->name.'_'.$single_document->name.'_'.date("d-m-Y",strtotime($historical->date)).'_V'.count($single_document->histories).'.pdf';

        if(Storage::exists('/private/'.$single_document->client->id.'/du/'.$historical->id.'.pdf')) {
            return Storage::download('/private/'.$single_document->client->id.'/du/'.$historical->id.'.pdf',$name);
        }else{
            return back()->with('status','Un problème est survenue')->with('status_type','danger');
        }
    }
}
