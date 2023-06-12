<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $page = [
            'title' => 'Bienvenue ' . Auth::user()->firstname . ' ' . Auth::user()->lastname,
            'sidebar' => 'home',
            'sub_sidebar' => ''
        ];

        $single_documents = Auth::user()->single_documents()->where('archived', 0)->get();

        if (count($single_documents) == 1) {
            return redirect()->route('dashboard', [$single_documents->first()->id]);
        }

        return view('app.dashboard.home', compact('page', 'single_documents'));
    }

    public function index($id)
    {
        $single_document = $this->checkSingleDocument($id);
        $single_document->loadMissing( 
            'dangers.danger',
            'dangers.sd_risk',
            'dangers.sd_risk.sd_restraints',
            'dangers.sd_works_units.sd_risks.sd_restraints',
            'client.single_documents',
            'psychosocial_groups',
            'histories'
        );

        $page = [
            'title' => 'Bienvenue ' . Auth::user()->firstname . ' ' . Auth::user()->lastname,
            'sidebar' => 'dashboard',
            'sub_sidebar' => ''
        ];

        $moyenneRB = $single_document->moyenneRB();
        $colorRB = $single_document->color($moyenneRB, true);
        $moyenneRR = $single_document->moyenneRR();
        $colorRR = $single_document->color($moyenneRR, false);
        $discountRisk = $single_document->discountRisk($moyenneRB, $moyenneRR);

        $data = compact(
            'page',
            'single_document',
            'moyenneRB',
            'colorRB',
            'moyenneRR',
            'colorRR',
            'discountRisk'
        );

        return view('app.dashboard.index', $data);
    }
}
