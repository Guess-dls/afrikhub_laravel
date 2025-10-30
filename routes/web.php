<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\VerificationController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\ResidenceController;
use App\Models\User;

Route::get('/', function () { return view('accueil'); })->name('accueil');

Route::get('/login', function () { return view('auth.login'); })->name('login');

Route::get('/recherche', function () { return view('pages.recherche'); })->name('recherche');

Route::get('/mise_en_ligne', function () { return view('pages.mise_en_ligne'); })->name('mise_en_ligne');

Route::get('/register', function () { return view('auth.register'); })->name('register');

Route::get('/message', function () { return view('pages.messages'); })->name('message');

Route::get('/residences', function () { return view('pages.residences'); })->name('residences');

Route::get('/accueil', function () { return view('pages.dashboard'); })->middleware('auth')->name('accueil');

Route::get('/mise_en_ligne', function () { return view('pages.mise_en_ligne'); })->name('mise_en_ligne');


// lien vers une page avec un id ciblé ou un element ciblé dans l'url


Route::get('/email_repeat', [LogController::class, 'email_repeat'])->name('email_repeat');

Route::get('/verify/{token}', [VerificationController::class, 'verify'])->name('verify');

Route::get('/recherche', [ResidenceController::class, 'recherche_img'])->name('recherche')->middleware('auth');

Route::get('/details/{id}', [ResidenceController::class, 'details'])->name('details');

Route::get('residences/{residence}/edit', [AdminController::class, 'modification'])->name('admin.residences.edit');



//ces route recupere des infos dans la bd et les affiche sur la page concernée

Route::get('/logout', [LogController::class, 'logout'])->name('logout');

//residence de l'utilisateur connecté
Route::get('/residences', [ResidenceController::class, 'index'])->name('residences')->middleware('auth');

//toutes les reservation seront visible pas l'admin
Route::get('reservations', [AdminController::class, 'reservations'])->name('admin.reservations.all');

//tout les utilisateurs seront visible pas l'admin
Route::get('utilisateur', [AdminController::class, 'utilisateurs'])->name('admin.utilisateurs.all');

// toutes les residences seront visible pas l'admin
Route::get('/admin/residences', [AdminController::class, 'residences'])->name('admin.residences');



// route pour faire un action dans la base de données

//login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

//pour enregistrer la résidence
Route::post('/residences', [ResidenceController::class, 'store'])->name('residences.store');

//faire une reservation
Route::post('/reservation/{id}', [ReservationController::class, 'store'])->middleware('auth')->name('reservation.store');

// annuler une reservation
Route::post('/reservation/{id}/anulation', [ReservationController::class, 'annuler'])->name('annuler');

//accepter une reservation
Route::post('/reservation/{id}/accepter', [ReservationController::class, 'accepter'])->name('reservation.accepter');

//refuser une reservation
Route::post('/reservation/{id}/refuser', [ReservationController::class, 'refuser'])->name('reservation.refuser');

// Rebooking
Route::get('/reservation/{id}/rebook', [ReservationController::class, 'rebook'])->name('rebook');


Route::post('residences/{id}/activation', [AdminController::class, 'activation'])->name('admin.residences.activation');

Route::post('residences/{id}/activation', [AdminController::class, 'residence_update'])->name('admin.residences.update');


Route::post('residences/{id}/desactivation', [AdminController::class, 'desactivation'])->name('admin.residences.desactivation');

Route::delete('residences/{residence}/sup', [AdminController::class, 'suppression'])->name('admin.residences.sup');


//affichage du contenu de la bd sur une page specifique

Route::get('/historique', [ReservationController::class, 'historique'])->middleware('auth')->name('historique');

Route::get('/mes-demandes', [ReservationController::class, 'mesDemandes'])->middleware('auth')->name('mes_demandes');

Route::get('/dashboard_resi_reserv', [ResidenceController::class, 'dashboard_resi_reserv'])->name('dashboard_resi_reserv')->middleware('auth');

Route::get('/occupees', [ResidenceController::class, 'occupees'])->name('occupees')->middleware('auth');

Route::get('/dashboard', [ResidenceController::class, 'dashboard_resi_reserv'])->middleware('auth')->name('dashboard');

Route::get('/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');

Route::get('/admin/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');


// Route pour afficher les résidences de l'utilisateur (méthode GET)
Route::get('/admin/users/{user}/residences', [AdminController::class, 'showUserResidences'])->name('admin.users.residences');

// Route pour suspendre/réactiver (méthode POST)
Route::post('/admin/users/{user}/toggle', [AdminController::class, 'toggleUserSuspension'])->name('admin.users.toggle_suspension');


// Route pour supprimer (méthode DELETE)
Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');





use App\Http\Controllers\MailTestController;

Route::get('/sendmail', [MailTestController::class, 'index'])->name('');
Route::post('/sendmail', [MailTestController::class, 'send'])->name('mail.send');
