<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UtilisateurController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        
        // Validate and sanitize input parameters
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'status' => 'nullable|in:individuel,entreprise',
            'role' => 'nullable|in:admin,client'
        ]);

        // Search filter
        if (!empty($validated['search'])) {
            $search = $validated['search'];
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('nom', 'like', "%{$search}%")
                  ->orWhere('prenom', 'like', "%{$search}%");
            });
        }
        
        // Status filter
        if (!empty($validated['status'])) {
            $query->where('status', $validated['status']);
        }
        
        // Role filter
        if (!empty($validated['role'])) {
            $query->where('role', $validated['role']);
        }

        // Get paginated results
        $users = $query->orderBy('created_at', 'desc')->paginate(10);

        // Get analytics data
        $totalUsers = User::count();
        $individualCount = User::where('status', 'individuel')->count();
        $enterpriseCount = User::where('status', 'entreprise')->count();

        return view('admin.utilisateurs.index', [
            'users' => $users,
            'totalUsers' => User::count(),
            'individualCount' => User::where('status', 'individuel')->count(),
            'enterpriseCount' => User::where('status', 'entreprise')->count(),
            'currentUser' => auth()->user() // Add this line
        ]);
    }
    
    public function show(User $user)
{
    return view('admin.utilisateurs.show', compact('user'));
}

    /**
     * Delete a user
     */
    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::delete($user->image);
        }
        
        $user->delete();
        
        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
    
    /**
     * Update user information
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'nom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:individuel,entreprise',
            'role' => 'required|in:admin,client', // Added role validation
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $validated['image'] = $request->file('image')->store('profile-images', 'public');
        }
        
        $user->update($validated);
        
        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Informations de l\'utilisateur mises à jour avec succès.');
    }
}