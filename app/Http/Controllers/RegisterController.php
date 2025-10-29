<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function handleForm(RegisterRequest $request)
    {
  
        return redirect()->back()->with('success', 'Formulaire soumis avec succès !');
    }
}
