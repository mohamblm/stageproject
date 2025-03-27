<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use App\Models\Formation;

class AvisController extends Controller
{
    public function show($formationId)
    {
        $formation = Formation::findOrFail($formationId);
        
        // Get all reviews for the formation
        $reviews = Avis::where('formation_id', $formationId)->get();
        
        // Calculate average rating
        $averageRating = $reviews->avg('note') ?? 0;
        $averageRating = number_format($averageRating, 1);
        
        // Count total reviews
        $totalReviews = $reviews->count();
        
        // Calculate rating distribution percentages
        $ratingCounts = $reviews->groupBy('note')->map->count();
        
        $ratingPercentages = [];
        for ($i = 5; $i >= 1; $i--) {
            $ratingPercentages[$i] = $totalReviews > 0 
                ? round(($ratingCounts[$i] ?? 0) / $totalReviews * 100, 2)
                : 0;
        }
        
        return view('formation.show', compact('formation', 'reviews', 'averageRating', 'totalReviews', 'ratingPercentages'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);
        
        Avis::create([
            'formation_id' => $request->formation_id,
            'user_id' => auth()->id(),
            'note' => $request->rating,
            'commentaire' => $request->comment,
        ]);
        return redirect()->back()->with('status', 'added_commit');
        
    }

}
