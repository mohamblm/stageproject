<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Wishlist ;

class ProfileController extends Controller
{
    public function index()
{
    return view('profile.profile', ['section' => 'witshlist']); 
}


    public function section(Request $request,$section)
    {
        $validSections = ['historique', 'edite', 'wishlist'];

        if (!in_array($section, $validSections)) {
            abort(404);
        }
        $user = auth()->user();
        if($section === 'wishlist' ){
            $wishlist = $user->wishlists()
            ->with([
                'formation' => function($query) {
                    $query->with(['etablissement']); // Only existing etablissements
                }
            ])
            ->whereHas('formation') // Only wishlist items with existing formations
            ->get();
            return view('profile.profile', [
                'section' => $section,
                'user' => $user,
                'wishlist' => $wishlist
            ]);
        }
        if($section === 'historique' ){
            $inscriptions = Auth::user()->inscriptions()
            ->with(['formation', 'formation.etablissement'])
            ->orderBy('created_at', 'desc')
            ->get();

            return view('profile.profile', [
                'section' => $section,
                'user' => $user,
                'inscriptions'=>$inscriptions
            ]);
      }

        return view('profile.profile', [
            'section' => $section,
            'user' => $user,
            // 'wishlist' => $wishlist
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.partials.edit', [

            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
{
    $user = Auth::user();

    // Validate input
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
        'nom' => ['nullable', 'string', 'max:255'],
        'prenom' => ['nullable', 'string', 'max:255'],
        'phone' => ['nullable', 'string', 'max:20'],
        'status' => ['required', 'in:individuel,entreprise'],
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    // Update user data
    $user->fill($validated);

    // Handle profile image upload
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($user->image) {
            Storage::delete('public/profile_images/' . $user->image);
        }

        // Store new image
        $imagePath = $request->file('image')->store('profile_images', 'public');
        $user->image = $imagePath;
    }

    // Reset email verification if email is changed
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();
    return Redirect::route('profile.section', 'edite')
    ->with('status', 'profile-updated')
    ->with('success', 'Le profil a été enregistré avec succès.');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $quest->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

 
}
