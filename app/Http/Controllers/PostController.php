<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //

    public function index()
    {

        $posts = Post::with(['author'])->orderBy('updated_at', 'desc')->paginate(5);

        return view("posts.index", ['posts' => $posts]);
    }

    public function show()
    {

        $post = Post::with('author')->findOrFail(request('id'));

        return view("posts.show", ['post' => $post]);
    }

    public function create()
    {


        if (! Auth::user() || Auth::user()->role == 0)
        {
            return redirect('/');
        }


        return view('posts.create');
    }

    public function store()
    {


        if (! Auth::user() || Auth::user()->role == 0)
        {
            return redirect('/');
        }

        $attributes = request()->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'text' => ['required']
        ]);

        $attributes['user_id'] = Auth::user()['id'];

        Post::create($attributes);
        return redirect('/');
    }
}
