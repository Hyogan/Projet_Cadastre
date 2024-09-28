<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});
// Route::get('/', [MessageController::class,'create']);

                                    // USER BASICS CRUD

Route::get('/user/login', [UserController::class,"login"])->name("user.login");
Route::post("/user/register",[UserController::class,"register"])->name("user.store");
Route::get('/user/signup',[UserController::class,"signup"])->name("user.signup");

Route::get('/user/show/{id}', [UserController::class,"show"])->name("user.show");
Route::post("/user/authenticate",[UserController::class,"authenticate"])->name("user.authenticate");
Route::get("/user/logout",[UserController::class,"logout"])->name("user.logout");



// Routes pour les clients
Route::middleware('auth')->group(function () {
    Route::get('client/home',[ClientController::class,'home'])->name('client.acceuil');
    Route::get('demandes/create', [DemandeController::class, 'create'])->name('client.demandes.create');
    Route::get('demandes/delete/{demande}', [DemandeController::class, 'supprimer'])->name('client.demandes.supprimer');
    Route::get('demandes/modifier/{demande}', [DemandeController::class, 'modifier'])->name('client.demandes.modifier');
    Route::get('demandes/liste', [DemandeController::class, 'getDemandesUtilisateur'])->name('client.demandes.listes');
    Route::post('demandes', [DemandeController::class, 'store'])->name('demandes.store');
    Route::post('demandes/update/{demande}', [DemandeController::class, 'update'])->name('demandes.update');
    Route::get('demandes/{demande}', [DemandeController::class, 'show'])->name('demandes.show');
});



// Routes pour les administrateurs
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('user/delete/{user}', [UserController::class,'delete'])->name('user.delete');
    Route::get('demandes', [AdminController::class, 'listeDemandes'])->name('demandes.index');
    Route::get('gestionnaire/create',[GestionnaireController::class,'create'])->name('gestionnaire.create');
    Route::post('gestionnaire/store',[GestionnaireController::class,'store'])->name('gestionnaire.store');

});

// Routes pour les gestionnaires
Route::middleware(['auth', 'role:gestionnaire'])->group(function () {
    Route::get('gestionnaire/dashboard', [GestionnaireController::class, 'dashboard'])->name('gestionnaire.dashboard');
    Route::get('gestionnaire/demandes', [GestionnaireController::class, 'listeDemandes'])->name('listeDemandes.index');
    Route::get('document/create/{demande}', [DocumentController::class, 'create'])->name('document.create');
    Route::post('document/store', [DocumentController::class, 'store'])->name('document.store');

    // Autres routes pour le gestionnaire
});


Route::middleware('auth')->group(function () {
    
    Route::get('/demands/{demande}/pdf', [DemandeController::class, 'generatePdf'])->name('demandes.pdf');
    Route::get('/demands/{demande}/consulter', [DemandeController::class, 'consulter'])->name('demandes.consulter');
});


Route::get('/messages', [MessageController::class, 'index'])->name('message.index');
Route::get('/messages/create', function() {
    return view('home');
})->name('messages.create');
Route::post('/message/store', [MessageController::class, 'store'])->name('message.store');
Route::get('message/delete/{message}', [MessageController::class,'delete'])->name('messsage.delete');

