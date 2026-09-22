<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::get('/produits/{id}', [ProduitController::class, 'show'])->name('produits.show');
Route::get('/produits/{id}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{id}', [ProduitController::class, 'update'])->name('produits.update');
Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');



Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');



Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::get('/panier/ajouter/{id}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::get('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');
Route::get('/panier/vider', [PanierController::class, 'vider'])->name('panier.vider');



Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
Route::get('/commandes/creer', [CommandeController::class, 'creer'])->name('commandes.creer');
Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');



Route::get('/admin/produits', [AdminController::class, 'produits'])->name('admin.produits');
Route::get('/admin/produits/create', [AdminController::class, 'produitsCreate'])->name('admin.produits.create');
Route::post('/admin/produits/store', [AdminController::class, 'produitsStore'])->name('admin.produits.store');


Route::get('/admin/produits/{id}', [AdminController::class, 'produitsShow'])->name('admin.produits.show');

Route::get('/admin/produits/{id}/edit', [AdminController::class, 'produitsEdit'])->name('admin.produits.edit');
Route::put('/admin/produits/{id}', [AdminController::class, 'produitsUpdate'])->name('admin.produits.update');
Route::delete('/admin/produits/{id}', [AdminController::class, 'produitsDestroy'])->name('admin.produits.destroy');



Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
Route::get('/admin/categories/create', [AdminController::class, 'categoriesCreate'])->name('admin.categories.create');
Route::post('/admin/categories/store', [AdminController::class, 'categoriesStore'])->name('admin.categories.store');
Route::get('/admin/categories/{id}/edit', [AdminController::class, 'categoriesEdit'])->name('admin.categories.edit');
Route::put('/admin/categories/{id}', [AdminController::class, 'categoriesUpdate'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [AdminController::class, 'categoriesDestroy'])->name('admin.categories.destroy');



Route::get('/admin/commandes', [AdminController::class, 'commandes'])->name('admin.commandes');
Route::get('/admin/commandes/{id}', [AdminController::class, 'commandeShow'])->name('admin.commandes.show');
Route::put('/admin/commandes/{id}/statut', [AdminController::class, 'commandeUpdateStatut'])->name('admin.commandes.statut');
Route::delete('/admin/commandes/{id}', [AdminController::class, 'commandeDestroy'])->name('admin.commandes.destroy');
