<?php

use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
Broadcast::channel('admin-notifications', function ($user) {
    
    return true; // Assuming you're using spatie/laravel-permission or similar
});