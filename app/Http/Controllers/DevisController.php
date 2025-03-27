<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Inscription;
class DevisController extends Controller
{
    public function download(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'formations' => 'required|json'
        ]);
        
        // Decode the formations data
        $formations = json_decode($request->formations, true);
        
        if (empty($formations)) {
            return back()->with('error', 'Aucune formation sélectionnée');
        }
        
        // Insert records into the inscriptions table for each selected formation
        foreach ($formations as $formationData) {
            // Extract the formation_id from the formation data
            $formationId = $formationData['formation_id']; // Assuming this field exists in your JSON
            
            // Create a new inscription record
            DB::table('inscriptions')->insert([
                'user_id' => $user->id,
                'formation_id' => $formationId,
                 'number_personne'=>$formationData['participants'] ?? 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
        // Generate the PDF using the selected formations
        $pdf = PDF::loadView('devis.pdf', [
            'formations' => $formations,
            'date' => Carbon::now()->format('d/m/Y'),
            'reference' => 'DEV-' . Carbon::now()->format('YmdHis'),
            'user' => $user
        ]);
        
        // Return the PDF as a download
        return $pdf->download('devis_' . Carbon::now()->format('Y-m-d_His') . '.pdf');
    }
}