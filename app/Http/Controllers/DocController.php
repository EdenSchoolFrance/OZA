<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\DocFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{
    public function index($id, $name = null)
    {
        if ($name) {
            $single_document = $this->checkSingleDocument($id);
            $doc = Doc::where('name', $name)->first();
        } else {
            $doc = Doc::where('name', $id)->first();
        }

        if (!$doc) {
            abort(404);
        }

        $page = [
            'title' => $doc->title,
            'sidebar' => $doc->name,
            'sub_sidebar' => '',
        ];

        if ($name) {
            return view('app.documentation.index', compact('page', 'doc', 'single_document'));
        } else {
            return view('app.documentation.index', compact('page', 'doc'));
        }
    }

    public function edit($doc_name)
    {
        $doc = Doc::where('name', $doc_name)->first();

        if (!$doc) {
            abort(404);
        }

        $page = [
            'title' => $doc->title,
            'sidebar' => $doc->name,
            'sub_sidebar' => '',
        ];

        $files = DocFile::where('doc_id',$doc->id)->get();

        return view('app.documentation.edit', compact('page', 'doc','files'));
    }

    public function update(Request $request, $doc_name)
    {
        $doc = Doc::where('name', $doc_name)->first();

        if (!$doc) {
            abort(404);
        }

        $doc->content = $request->contentFiles;
        $doc->save();

        return back();
    }

    public function upload(Request $request, $doc_name)
    {
        $request->validate([
            'file' => 'nullable'
        ]);

        $doc = Doc::where('name', $doc_name)->first();

        if (!$doc) {
            abort(404);
        }

        $file = $request->file('file');

        Storage::putFileAs('/private/doc/'.$doc_name.'/files/', $file, $file->getClientOriginalName());

        $doc_file = new DocFile();
        $doc_file->id = uniqid();
        $doc_file->name = $file->getClientOriginalName();
        $doc_file->date = date("Y-m-d");
        $doc_file->user()->associate(Auth::user());
        $doc_file->doc()->associate($doc);
        $doc_file->save();

        return back()->with('status','Votre document a bien été enregistré, vous pouvez maintenant l\'utiliser !');
    }

    public function delete(Request $request, $doc_name)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $doc = Doc::where('name', $doc_name)->first();

        if (!$doc) {
            abort(404);
        }

        $file = DocFile::find($request->id);

        if (!$file) {
            abort(404);
        }

        if(Storage::exists('/private/doc/'.$doc->name.'/files/'.$file->name)) {
            Storage::delete('/private/doc/'.$doc->name.'/files/'.$file->name);
        }

        $file->delete();

        return back()->with('status','Votre document a bien été supprimé !');
    }


    public function download($doc_name, $file_name){

        $doc = Doc::where('name', $doc_name)->first();

        if (!$doc) {
            return back()->with('status','Un problème est survenue')->with('status_type','danger');
        }

        $file = DocFile::where('name',$file_name)->first();

        if (!$file) {
            return back()->with('status','Un problème est survenue')->with('status_type','danger');
        }

        return Storage::download('/private/doc/'.$doc->name.'/files/'.$file->name);

    }
}
