<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UtilisateurController;
use App\Http\Controllers\Admin\DomaineadminController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FormationadminController;
use App\Http\Controllers\Admin\InscriptionadminController;
use App\Http\Controllers\Admin\EtablissementadminController;
use App\Http\Controllers\Controller;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/etablissements', [EtablissementController::class, 'index'])->name('etablissements.index');











Route::get('/formations', [FormationController::class, 'index'])->name('formations');
Route::get('/formation/{id}', [FormationController::class, 'show'])->name('formation.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{formationId}', [WishlistController::class, 'addToCart'])->name('cart.add'); 
    Route::post('/cart/devis/{formationId}', [WishlistController::class, 'add_and_redirect_to_wishlist'])->name('cart.devis');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/avis/add', [AvisController::class, 'store'])->name('avis.store');
});

Route::get('/plans', function () {
    return view('pages.plans.plans');
})->name('plans');

Route::get('/about', function () {
    return view('pages.about.about');
})->name('about');

Route::get('/cart', function () {
    return view('pages.cart.cart');
})->name('cart');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{section}', [ProfileController::class, 'section'])->name('profile.section');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/wishlist/remove-item', [WishlistController::class, 'removeItem'])
    ->name('wishlist.removeItem');
    Route::post('/devis/download', [DevisController::class, 'download'])->name('devis.download');
});

Route::middleware(['auth','IsAdmin'])->group(function () {

    
    // Formations
    Route::resource('dashboardformations', FormationadminController::class)->names([
        'index' => 'admin.formations.index',
        'create' => 'admin.formations.create',
        'store' => 'admin.formations.store',
        'edit' => 'admin.formations.edit',
        'update' => 'admin.formations.update',
        'destroy' => 'admin.formations.destroy',
        

    ]);
    
    // Domaines
    Route::resource('dashboarddomaines', DomaineadminController::class)->names([
        'index' => 'admin.domaines.index',

    ]);
    // Etablissements
    Route::resource('dashboardetablissements', EtablissementadminController::class)
    ->names([
        'index' => 'admin.etablissements.index',

    ]);
    
    // Inscriptions
    Route::resource('dashboardinscriptions', InscriptionadminController::class)->names([
        'index' => 'admin.inscriptions.index'
    ]);
    // contacts
    Route::resource('dashboarcontact', ContactController::class)->names([
        'index' => 'admin.contacts.index'
    ]);
    
    // Utilisateurs
    Route::resource('dashboardutilisateurs', UtilisateurController::class)->names([
        'index' => 'admin.utilisateurs.index'
    ]);
    Route::get('/utilisateurs/{user}', [\App\Http\Controllers\Admin\UtilisateurController::class, 'show'])
         ->name('admin.utilisateurs.show');
    Route::delete('/users/{user}', [UtilisateurController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}', [UtilisateurController::class, 'update'])->name('users.update');
    // Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard.index');

});

// Route::middleware('auth')->group(function () {
    
// });
Route::middleware('auth')->group(function () {
    Route::get('/notifications/showall', [App\Http\Controllers\NotificationController::class, 'showAll'])->name('notifications.index');
    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index']);
    Route::get('/notifications/{id}/mark-as-read', [App\Http\Controllers\NotificationController::class, 'markAsRead']);
    Route::get('/notifications/mark-all-as-read', [App\Http\Controllers\NotificationController::class, 'markAllAsRead']);
    Route::get('/notifications/{id}', [App\Http\Controllers\NotificationController::class, 'delete']);
});
Route::get('/test',[FormationController::class,'test']);
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy', 'privacy')->name('privacy');

// contact route : 
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

require __DIR__.'/auth.php';
