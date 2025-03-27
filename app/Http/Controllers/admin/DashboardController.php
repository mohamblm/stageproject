<?php

namespace App\Http\Controllers\Admin;

use App\Models\Domaine;
use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etablissement;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $formationsNumber = Formation::count();
        $domainesNumber = Domaine::count();
        $inscriptionsNumber = Inscription::count();
        $etablissementsNumber = Etablissement::count();
        $utilisateursNumber = User::count();
        $userName = \Illuminate\Support\Facades\Auth::user()->name; // Assuming the user is authenticated
        return view('admin.dashboard.index', [
            'formationsNumber' => $formationsNumber,
            'domainesNumber' => $domainesNumber,
            'inscriptionsNumber' => $inscriptionsNumber,
            'userName' => $userName,
            'etablissementsNumber' => $etablissementsNumber,
            'utilisateursNumber' => $utilisateursNumber

        ]);
    }
}
