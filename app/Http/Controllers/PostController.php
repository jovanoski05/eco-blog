<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

use App\Models\UserApi;

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

        $recent = Post::orderBy('updated_at', 'desc')->take(4)->get();
        $post = Post::with('author')->findOrFail(request('id'));

        return view("posts.show", ['post' => $post, 'recents'=>$recent]);
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
        return redirect('/posts');
    }

    public function apistore()
    {
        $user_id = User::where('email', '=', request()['auth']['email'])->get()->all();

        if (!$user_id || !password_verify(request()['auth']['APIKey'], UserApi::where('user_id', '=', $user_id[0]['id'])->get()->all()[0]['API_Key']))
        {
            return 'Auth Error';
        }

        $attributes = request()['content'];
        $attributes['user_id'] = $user_id[0]['id'];
        Post::create($attributes);


        return "Completed";
    }

    public function destroy()
    {
        $post = Post::with('author')->findOrFail(request('id'));

        if (! Auth::check() || Auth::user()['id'] != $post->author->id)
        {
            return abort(403);
        }

        $post->delete();

        return redirect('/posts');
    }
}
