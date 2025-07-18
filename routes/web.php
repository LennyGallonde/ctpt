<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\EditoController;
use App\Http\Controllers\Admin\EquipeJoueurController;
use App\Http\Controllers\Admin\EquipePedagogiqueController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TarifController;
use App\Models\Edito;
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

Route::get('/', function () {
       $edito=Edito::find(1);
    return view('accueil',["edito"=>$edito]);
});
Route::get('/accueil', function () {
    $edito=Edito::find(1);
    return view('accueil',["edito"=>$edito]);
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

// Si l'utilisateur est connecter a son compte
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Si l'utilisateur est admin
Route::middleware('onlyAdmin')->group(function () {
    //Traitement/reception du formulaire d'ajout
    Route::post('/admin/equipeJoueur', [EquipeJoueurController::class, "store"]);
    //Traitement/reception du formulaire de modif
    Route::post('/admin/equipeJoueur/{equipeJoueur}/update', [EquipeJoueurController::class, "update"]);
    //Traitement du formulaire pour supprimer
    Route::post('/admin/equipeJoueur/{equipeJoueur}/delete', [EquipeJoueurController::class, "destroy"]);
    //Affichage du formulaire de modication
    Route::get('/admin/equipeJoueur/{equipeJoueur}/edit', [EquipeJoueurController::class, "edit"]);
    //Affichage de la page avec le tableau
    Route::get('/admin/equipeJoueur', [EquipeJoueurController::class, "index"]);
    //Affichage du formulaire d'ajout
    Route::get('/admin/equipeJoueur/create', [EquipeJoueurController::class, "create"]);
    //Affichage de la page qui affiche le detail d'une equipe
    Route::get('/admin/equipeJoueur/{equipeJoueur}', [EquipeJoueurController::class, "show"]);

    Route::get('/admin/equipePedagogique', [EquipePedagogiqueController::class, 'index']);
    Route::get('/admin/equipePedagogique/create', [EquipePedagogiqueController::class, 'create'])->name("equipe-pedagogique.create");
    Route::post('/admin/equipePedagogique', [EquipePedagogiqueController::class, 'store']);
    Route::get('/admin/equipePedagogique/{equipePedagogique}/edit', [EquipePedagogiqueController::class, 'edit']);
    Route::put('/admin/equipePedagogique/{equipePedagogique}', [EquipePedagogiqueController::class, 'update']);
    Route::delete('/admin/equipePedagogique/{equipePedagogique}', [EquipePedagogiqueController::class, 'destroy']);
    Route::get('/admin/equipePedagogique/{equipePedagogique}', [EquipePedagogiqueController::class, 'show']);

Route::resource("/admin/article",ArticleController::class);
Route::resource("/admin/user",AdminUserController::class);

Route::get("/admin/edito",[EditoController::class,"index"]);
Route::put("/admin/edito/{edito}",[EditoController::class,"update"]);
});




Route::get('/club/ej', [Controller::class, "consulterEquipesJ"]);
Route::get('/club/ep', [EquipePedagogiqueController::class, 'equipePedagogique']);
Route::get('/visiteur/article/{idSport}',[Controller::class,"consulterArticle"]);
Route::get('/visiteur/article/{id}',[ArticleController::class,"show"]);

Route::get('/admin/tarif/edit', [TarifController::class, 'edit'])->name('tarif.edit');
Route::post('/admin/tarif/update', [TarifController::class, 'update'])->name('tarif.update');
Route::get('/inscription', [TarifController::class, 'showInscription']);
Route::view('/contact', 'contact')->name('contact.form');

Route::get('/club/structure', [Controller::class, 'structure']);





require __DIR__ . '/auth.php';
