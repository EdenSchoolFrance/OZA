<?php

namespace App\Http\Controllers;

use App\Models\Single_document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index($id){

        $page = [
            'title' => 'Présentation de la structure',
            'sidebar' => 'structure',
            'sub_sidebar' => 'presentation'
        ];

        $single = Single_document::find($id);
        if (!empty($single)){
            session(['du' => $id]);
            return view('app.dashboard.index', compact('page', 'single','id'));
        }
        return redirect()->route('dashboard.home');
    }

    public function home(){

        $page = [
            'title' => 'Bienvenue '.Auth::user()->firstname.' '.Auth::user()->lastname,
            'nav' => 'nodrop',
            'sidebar' => 'home',
        ];

        return view('app.dashboard.home', compact('page'));
    }


    public function storeInfo(Request $request, $id){

        $request->validate([
            'name_enterprise' => 'required',
            'adress' => 'required',
            'city_zipcode' => 'required',
            'city' => 'required'
        ]);

        $single = Single_document::find($id);
        $single->name_enterprise = $request->name_enterprise;
        $single->adress = $request->adress;
        if ($request->additional_adress) $single->additional_adress = $request->additional_adress;
        $single->city_zipcode = $request->city_zipcode;
        $single->city = $request->city;
        $single->save();

        return back();
    }

    public function storeDesc(Request $request, $id){

        $request->validate([
            'desc' => 'required'
        ]);

        $single = Single_document::find($id);
        $single->description = $request->desc;
        $single->save();

        return back();

    }

    public function storeResp(Request $request, $id){

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $single = Single_document::find($id);
        $single->firstname = $request->firstname;
        $single->lastname = $request->lastname;
        $single->email = $request->email;
        $single->phone = $request->phone;
        $single->save();

        return back();

    }
}
