<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function register()
    {
        return view("user.register");
    }

    public function login()
    {
        return dd("Login page");
    }

    public function create()
    {
        return dd("Login user");
    }

    public function store()
    {

        $attributes = request()->validate([
            'email' => ['email', 'required', 'max:255'],
            'name' => ['max:128', 'required'],
            'password' => ['required', 'min:8', 'max:64', 'confirmed']
        ]);

        try {
            $user = User::create($attributes);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'register' => 'Could not register'
            ]);
        }

        Auth::login($user);

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
