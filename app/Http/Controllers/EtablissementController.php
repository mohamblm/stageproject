<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;

class EtablissementController extends Controller
{

    public function index()
    {
        $etablissements = Etablissement::all();
        return view('pages.home.etablissements', compact('etablissements'));
    }
}
