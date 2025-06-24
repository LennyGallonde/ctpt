<?php

use App\Http\Controllers\EquipeJoueurController;
use App\Http\Controllers\EquipePedagogiqueController;
use App\Http\Controllers\ProfileController;
use App\Models\EquipeJoueur;
use Illuminate\Support\Facades\Route;

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

Route::get('/accueil', function () {
    return view('accueil');
});
Route::get('/inscription', function () {
    return view('inscription');
});

Route::get('/club', function () {
    return view('club');
});

Route::get('/club/bureau', function () {
    return view('visiteur.club.bureau');
});

Route::get('/admin/test', function () {
    return view('admin.testadmin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Traitement/reception du formulaire d'ajout
Route::post('/admin/equipeJoueur',[EquipeJoueurController::class,"store"]);
//Traitement/reception du formulaire de modif
Route::post('/admin/equipeJoueur/{equipeJoueur}/update',[EquipeJoueurController::class,"update"]);
//Traitement du formulaire pour supprimer
Route::post('/admin/equipeJoueur/{equipeJoueur}/delete',[EquipeJoueurController::class,"destroy"]);
//Affichage du formulaire de modication
Route::get('/admin/equipeJoueur/{equipeJoueur}/edit',[EquipeJoueurController::class,"edit"]);
//Affichage de la page avec le tableau
Route::get('/admin/equipeJoueur',[EquipeJoueurController::class,"index"]);
//Affichage du formulaire d'ajout
Route::get('/admin/equipeJoueur/create',[EquipeJoueurController::class,"create"]);
//Affichage de la page qui affiche le detail d'une equipe
Route::get('/admin/equipeJoueur/{equipeJoueur}',[EquipeJoueurController::class,"show"]);

Route::get('/admin/equipePedagogique', [EquipePedagogiqueController::class, 'index']);
Route::get('/admin/equipePedagogique/create', [EquipePedagogiqueController::class, 'create']);
Route::post('/admin/equipePedagogique', [EquipePedagogiqueController::class, 'store']);
Route::get('/admin/equipePedagogique/{equipePedagogique}/edit', [EquipePedagogiqueController::class, 'edit']);
Route::post('/admin/equipePedagogique/{equipePedagogique}/update', [EquipePedagogiqueController::class, 'update']);
Route::post('/admin/equipePedagogique/{equipePedagogique}/delete', [EquipePedagogiqueController::class, 'destroy']);
Route::get('/admin/equipePedagogique/{equipePedagogique}', [EquipePedagogiqueController::class, 'show']);



require __DIR__.'/auth.php';
