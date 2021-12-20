<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SingleDocument;

class PresentationController extends Controller
{
    public function index($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Présentation de la structure',
            'sidebar' => 'structure',
            'sub_sidebar' => 'presentation'
        ];

        return view('app.presentation.index', compact('page', 'single_document'));
    }

    public function store(Request $request, $id, $type)
    {
        $this->checkSingleDocument($id);

        if ($type == 'info') {
            $request->validate([
                'name_enterprise' => 'required',
                'adress' => 'required',
                'city_zipcode' => 'required',
                'city' => 'required'
            ]);

            $single = SingleDocument::find($id);
            $single->name_enterprise = $request->name_enterprise;
            $single->adress = $request->adress;
            $single->additional_adress = $request->additional_adress;
            $single->city_zipcode = $request->city_zipcode;
            $single->city = $request->city;
            $single->save();
        } elseif ($type == 'desc') {
            $request->validate([
                'desc' => 'required'
            ]);
    
            $single = SingleDocument::find($id);
            $single->description = $request->desc;
            $single->save();
        } elseif ($type == 'resp') {
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);
    
            $single = SingleDocument::find($id);
            $single->firstname = $request->firstname;
            $single->lastname = $request->lastname;
            $single->email = $request->email;
            $single->phone = $request->phone;
            $single->save();
        }

        return back();
    }
}
