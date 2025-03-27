<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $etablissements = Etablissement::all();
        $domaines = Domaine::all();
        // Get trending formations (where trend = 1)
        $popularFormations = Formation::where('trend', 1)
            ->withCount(['inscriptions as total_participants' => function ($query) {
                $query->select(DB::raw('SUM(number_personne)'));
            }])
            ->with(['domaine', 'etablissement'])
            ->with('recentParticipants')
            ->latest()
            ->take(6)
            ->get();
        return view('welcome', compact('etablissements', 'domaines', 'popularFormations'));
    }
}
