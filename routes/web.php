<?php

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FournisseurController;

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('ajouter_fournisseur', [FournisseurController::class, 'ajouterFournisseur']);
Route::get('ajouter_produit', [ProduitController::class, 'ajouterProduit']);
Route::get('dashboard', [ProduitController::class, 'dashboard']);

Route::get('afficher_fournisseurs', [FournisseurController::class, 'afficherFournisseurs']);
Route::get('afficher_produits', [ProduitController::class, 'afficherProduits']);    
Route::get('afficher_produits_par_raisonsocial', [ProduitController::class, 'afficher_produits_par_raisonsocial']);   

Route::get('supprimer_fournisseur/{id}', [FournisseurController::class, 'supprimer_fournisseur']);    
Route::get('supprimer_produit/{id}', [ProduitController::class, 'supprimer_produit']);    


Route::post('ajouter_fournisseur_db', [FournisseurController::class, 'ajouterFournisseurToDb']);
Route::post('ajouter_produit_db', [ProduitController::class, 'ajouterProduitToDb']);

Route::get("modifier_fournisseur/{id}", [FournisseurController::class, "modifier_fournisseur"]);
Route::get("modifier_produit/{id}", [ProduitController::class, "modifier_produit"]);

Route::post("modifier_fournisseur_db", [FournisseurController::class, "modifier_fournisseur_db"]);
Route::post("modifier_produit_db", [ProduitController::class, "modifier_produit_db"]);
Route::post('afficher_produits_par_raisonsocial_db', [ProduitController::class, 'afficher_produits_par_raisonsocial_db']);   
