<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function verifLogin(){
        if (session()->has('auth')){
            return true;
        }else{
            abort(403);
        }
    }
    public function verifPermClient(){
        if (session()->get('auth.perm') === "client"){
            return true;
        }else{
            abort(403);
        }
    }
    public function verifPermAdmin(){
        if (session()->get('auth.perm') === "admin"){
            return true;
        }else{
            abort(403);
        }
    }
}
