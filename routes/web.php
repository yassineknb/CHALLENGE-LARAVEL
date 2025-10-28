<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController; // <-- ajouter cette ligne

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
    return view('welcome');
});

Route::get('/home', function() {
    return "Bonjour Laravel";
});

Route::get('/accueil', function() {
    return view('accueil');
});

Route::get('/test', [TestController::class, 'index']);

Route::get('/home', function() {
    return view('accueil');
})->name('home');

Route::get('/home/{nom?}', function($nom = 'Invité') {
    return "Bonjour, $nom !";
});

Route::get('/salutation/{prenom}', [TestController::class, 'greet'])->name('salutation');

Route::get('/profile/{id}/{age}', function($id, $age) {
    return "L’utilisateur $id a $age ans";
});

Route::get('/article/{id}', [TestController::class, 'showArticle']);

Route::get('/profile/{id}/{age}', function($id, $age) {
    return "L’utilisateur $id a $age ans";
})->whereNumber('id')->whereNumber('age');
