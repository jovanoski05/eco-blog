<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\UserApi;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function register()
    {
        if (Auth::user())
        {
            return redirect('/');
        }
        return view("user.register");
    }

    public function login()
    {
        if (Auth::user())
        {
            return redirect('/');
        }
        return view("user.login");
    }

    public function create()
    {
        if (Auth::user())
        {
            return redirect('/');
        }

        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email' => 'No matching user found'
            ]);
        }

        request()->session()->regenerate();

        Auth::login(Auth::user());

        return redirect('/');
    }

    public function getapi()
    {
        if (! Auth::user() || Auth::user()['role']==0)
        {
            return redirect('/');
        }

        $userKey = "We couldn't get your key";


        if (! UserApi::where('user_id', '=', Auth::user()->id)->get()->all())
        {
            $userKey = password_hash(Auth::user()['email'], PASSWORD_DEFAULT);

            UserApi::create(['user_id' => Auth::user()['id'], 'API_Key' => password_hash($userKey, PASSWORD_DEFAULT)]);
        }

        return view('user.getapi', ['key' => $userKey]);
    }

    public function store()
    {

        if (Auth::user())
        {
            return redirect('/');
        }

        $attributes = request()->validate([
            'email' => ['email', 'required', 'max:255'],
            'name' => ['max:128', 'required'],
            'password' => ['required', 'min:8', 'max:64', 'confirmed']
        ]);

        $attributes['role'] = 0;

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
        if (! Auth::user())
        {
            return redirect('/');
        }
        Auth::logout();

        return redirect('/');
    }
}
