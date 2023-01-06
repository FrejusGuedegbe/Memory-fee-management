<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    if(Auth()->guest()) {
        return redirect('login');
    } else {
        return redirect('dashboard');
    }
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


//verifiedInfos
Route::match(['get', 'post'], '/verifiedInfos',  [EtudiantController::class, 'verifiedInfos'])->name('infos');

//updateInfos
Route::match(['get', 'post'], '/updateInfos',  [EtudiantController::class, 'updateInfos'])->name('updateInfos');

//faire une notification
Route::match(['get', 'post'], '/faire_demande',  [EtudiantController::class, 'faireDemande'])->name('faireDemande');

//suivre_demande
Route::match(['get', 'post'], '/suivre_demande',  [EtudiantController::class, 'suivreDemande']);

//suivre_demande
Route::match(['get', 'post'], '/finDemande',  [EtudiantController::class, 'finDemande']);

//valDemande
Route::match(['get', 'post'], '/valDemande',  [EtudiantController::class, 'valDemande']);

//demandeV
Route::match(['get', 'post'], '/demandeV',  [EtudiantController::class, 'demandeV']);

//envoitresor
Route::match(['get', 'post'], '/envoitresor',  [EtudiantController::class, 'envoitresor']);


//valider
Route::match(['get', 'post'], '/valider/{id}',  [EtudiantController::class, 'valider'])->name('valider');

//rejeter
Route::match(['get', 'post'], '/rejeter/{id}',  [EtudiantController::class, 'rejeter'])->name('rejeter');

//statistiques
Route::match(['get', 'post'], '/statistiques',  [EtudiantController::class, 'statistiques'])->name('statistiques');

require __DIR__.'/auth.php';