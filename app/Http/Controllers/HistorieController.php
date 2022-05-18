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

        if(Storage::exists('/public/'.$single_document->client->id.'/du/'.$historie->id.'.pdf')) {
            Storage::delete('/public/'.$single_document->client->id.'/du/'.$historie->id.'.pdf');
        }

        $historie->delete();

        return back()->with('status', 'Une version historique de ce document unique a bien été supprimé !');
    }
}
