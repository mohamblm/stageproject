<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionAdminController extends Controller
{
    public function index(Request $request)
    {
        $formations = Formation::with('etablissement')->get();
        
        $query = Inscription::with(['user', 'formation.etablissement'])
            ->latest();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
                })
                ->orWhereHas('formation', function($q) use ($search) {
                    $q->where('nom', 'like', "%$search%")
                      ->orWhereHas('etablissement', function($q) use ($search) {
                          $q->where('nom', 'like', "%$search%");
                      });
                });
        }

        // Formation filter
        if ($request->filled('formation')) {
            $query->where('formation_id', $request->input('formation'));
        }

        // Date range filter
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $inscriptions = $query->paginate(10);

        // Analytics calculations
        $totalInscriptions = Inscription::count();
        $averageParticipants = round(Inscription::avg('number_personne'), 1);
        $uniqueFormations = Formation::has('inscriptions')->count();
        $uniqueEtablissements = DB::table('etablissements')
            ->join('formations', 'etablissements.id', '=', 'formations.etablissement_id')
            ->join('inscriptions', 'formations.id', '=', 'inscriptions.formation_id')
            ->distinct('etablissements.id')
            ->count('etablissements.id');

        return view('admin.inscriptions.index', compact(
            'inscriptions',
            'formations',
            'totalInscriptions',
            'averageParticipants',
            'uniqueFormations',
            'uniqueEtablissements'
        ));
    }
}