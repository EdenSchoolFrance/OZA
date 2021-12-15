<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Http\Request;

class DocController extends Controller
{
    public function index($doc_name)
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

        return view('app.documentation.index', compact('page', 'doc'));
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

        return view('app.documentation.edit', compact('page', 'doc'));
    }

    public function update(Request $request, $doc_name)
    {
        $doc = Doc::where('name', $doc_name)->first();

        if (!$doc) {
            abort(404);
        }

        $doc->content = $request->content;
        $doc->save();
        
        return back();
    }

    public function upload(Request $request)
    {
        $fileName = str_replace("blobid", "", $request->file('file')->getClientOriginalName());

        $path = $request->file('file')->storeAs('documentations', $fileName, 'public');

        return response()->json(['location' => '/storage/' . $path]);
    }
}
