<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Domaine;
use App\Models\Etablissement;
use App\Models\Avis;
use App\Models\User;
use App\Events\NewNotification;
use App\Notifications\NewUserRegistered;
use Illuminate\Support\Facades\Notification;


class FormationController extends Controller
{
    /**
     * Display the formations page with filtering options
     *
     * @return \Illuminate\View\View
     */
    // public function index()
    // {
    //     // Get all formations with their related data
    //     $formations = Formation::all();
    //         // with(['tags', 'etablissement'])
    //         // ->orderBy('date', 'desc')
    //         // ->get();
            
    //     return view('pages.formations.formations', compact('formations'));
    // }
    
    /**
     * Search for formations
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $id = $request->id;
        
        // // Search in formation titles and descriptions
        // $formation = Formation::findOrFail($id);
            
        // return view('pages.formation.formation', compact('formation'));
        $formation = Formation::findOrFail($id);
        
        // Get all reviews for the formation
        $reviews = Avis::where('formation_id', $id)->get();
        
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
        
        return view('pages.formation.formation', compact('formation', 'reviews', 'averageRating', 'totalReviews', 'ratingPercentages'));
    }
    /**
     * filter for formations
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if($request == null){
            // Get all formations with their related data
            $formations = Formation::all();
            // with(['tags', 'etablissement'])
            // ->orderBy('date', 'desc')
            // ->get();
            
            return view('pages.formations.formations', compact('formations'));
        }
        $domaines=Domaine::all();
        $etablissements=Etablissement::all();
        // dd($request->domaine);
        $query = Formation::query();
        
        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nom', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        // Apply domain filters
        if ($request->has('domaine_id')) {
            $query->whereIn('domaine_id', $request->domaine_id);
        }
        
        // Apply establishment filters
        if ($request->has('etablissement_id')) {
            $query->whereIn('etablissement_id', $request->etablissement_id);
        }
        // dd($request);
        $formations = $query->get();
        
        // if ($request->ajax()) {
        //     return view('formations._formations_list', compact('formations'));
        // }
        
        return view('pages.formations.formations', compact('formations' ,'domaines','etablissements'));
    }
    public function test(){
    //     $user = User::create([
    //         'name' => 'mohamed',
    //         'email' => 'moham23@gmail.com',
    //         'password' => 'password111',
    //     ]);
        
        // Find all admins (assuming 'admin' is stored in the 'role' column)
        // $admins = User::where('role', 'admin')->get();

        // Notify all admins
        // Notification::send($admins, new NewUserRegistered($user));
        // event(new NewNotification(['data'=>'salam']));
        $notification= [
            'title' => 'New User Registration',
            'message' => 'User  has registered',
            'user_id' =>1000,
            'type' => 'user_registration'
        ];
        
        // broadcast(new NewNotification((object) $message));
        event(new NewNotification($notification));

    return response()->json('success', 200);
    }
}
