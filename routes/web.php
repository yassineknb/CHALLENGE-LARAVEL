<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RegisterController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('accueil');
})->name('home');

Route::get('/home/{nom?}', function ($nom = 'Invité') {
    return "Bonjour, $nom !";
});

Route::get('/accueil', function () {
    return view('accueil');
});


Route::get('/test', [TestController::class, 'index']);
Route::get('/salutation/{prenom}', [TestController::class, 'greet'])->name('salutation');
Route::get('/article/{id}', [TestController::class, 'showArticle']);


Route::get('/profile/{id}/{age}', function ($id, $age) {
    return "L’utilisateur $id a $age ans";
})->whereNumber('id')->whereNumber('age');


Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');

Route::post('/register/submit', [RegisterController::class, 'handleForm'])->name('register.submit');
