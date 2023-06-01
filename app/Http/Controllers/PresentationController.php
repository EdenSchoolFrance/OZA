<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SingleDocument;
use Illuminate\Support\Facades\Validator;

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

    public function update(Request $request, $id, $type)
    {
        $this->checkSingleDocument($id);

        if ($type == 'info') {
            $validator = Validator::make($request->all(), [
                'name_enterprise' => 'required',
                'adress' => 'required',
                'city_zipcode' => 'required',
                'city' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('type', $type);
            }

            $single = SingleDocument::find($id);
            $single->name_enterprise = $request->name_enterprise;
            $single->adress = $request->adress;
            // $single->additional_adress = $request->additional_adress;
            $single->city_zipcode = $request->city_zipcode;
            $single->city = $request->city;
            $single->save();
        } elseif ($type == 'desc') {
            $validator = Validator::make($request->all(), [
                'sector' => 'required',
                'activity_description' => 'required',
                'premise_description' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('type', $type);
            }

            $single = SingleDocument::find($id);
            $single->sector = $request->sector;
            $single->activity_description = $request->activity_description;
            $single->premise_description = $request->premise_description;
            $single->save();
        } elseif ($type == 'resp') {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'post' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('type', $type);
            }

            $single = SingleDocument::find($id);
            $single->firstname = $request->firstname;
            $single->lastname = $request->lastname;
            $single->email = $request->email;
            $single->phone = $request->phone;
            $single->function = $request->post;
            $single->save();
        }

        return back()->with('status', 'Les données ont bien été modifiées !');
    }
}
