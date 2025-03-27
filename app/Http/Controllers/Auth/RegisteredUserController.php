<?php

namespace App\Http\Controllers\Auth;
         
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Notification;
use App\Events\NewNotification;
use App\Notifications\NewUserRegistered;
// use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;




class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:individuel,entreprise'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ['accepted'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'status' =>$request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'terms' => $request->has('terms'),
        ]);
        // // Find all admins (assuming 'admin' is stored in the 'role' column)
        // Store notification in the database



       
        $notification = Notification::create([
            
            'data' => json_encode([
                'title' => 'Nouvelle Inscription Utilisateur',
                'message' => 'L\'utilisateur ' . $user->name . ' s\'est inscrit',
                'user_id' => $user->id,
                'type' => 'inscription_utilisateur'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Broadcast the event

        event(new NewNotification($notification->toArray()));



        event(new Registered($user));

        Auth::login($user);

        return redirect(route('welcome', absolute: false));
    }
    
}
