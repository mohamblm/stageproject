<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function test(){
        // Find all admins (assuming 'admin' is stored in the 'role' column)
        $admins = User::where('role', 'admin')->get();

        // Notify all admins
        Notification::send($admins, new NewUserRegistered($user));
        event(new Registered($user));
    return response()->json('success', 200);
    }
}
