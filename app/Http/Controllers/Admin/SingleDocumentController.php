<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Client;
use App\Models\SdDanger;
use Illuminate\Http\Request;
use App\Models\SingleDocument;
use App\Http\Controllers\Controller;

class SingleDocumentController extends Controller
{
    public function store(Request $request, Client $client)
    {
        $dangers = $request->except(['name_single_document', '_token']);

        $validation = [
            'name_single_document' => 'required',
        ];

        foreach ($dangers as $key => $danger) {
            $validation[$key] = 'nullable|exists:dangers,id';
        }

        $request->validate($validation);

        $users = User::where('client_id', $client->id)->whereHas('role', function ($q) {
            $q->where('permission', 'ADMIN');
        })->get();

        $single_document = new SingleDocument();
        $single_document->id = uniqid();
        $single_document->name = $request->name_single_document;
        $single_document->client()->associate($client);
        $single_document->save();
        foreach ($users as $user) {
            $single_document->users()->attach($user);
        }

        foreach ($dangers as $danger) {
            $sd_danger = new SdDanger();
            $sd_danger->id = uniqid();
            $sd_danger->single_document()->associate($single_document);
            $sd_danger->danger()->associate($danger);
            $sd_danger->save();
        }

        return redirect()->route('admin.client.edit', [$client->id])->with('status', 'Le document unique a bien été créé !');
    }
}
