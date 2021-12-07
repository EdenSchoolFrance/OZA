<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Single_document;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($id)
    {
        $single_document = $this->checkSingleDocument($id);
        
        $page = [
            'title' => 'Utilisateurs',
            'infos' => 'Seul le responsable du DU peut valider la finalisation du DU',
            'sidebar' => 'structure',
            'sub_sidebar' => 'users'
        ];

        return view('app.user.index', compact('page', 'single_document'));
    }
}
