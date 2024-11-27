<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {

        $posts = [
            0 => [
                'id' => 0,
                'title' => "Sample Post",
                'description' => "Some description",
                "text" => 'This is a simple post with full description and so on and so on'
            ],
            1 => [
                'id' => 1,
                'title' => "Sample Post",
                'description' => "Some description",
                "text" => 'This is a simple post with full description and so on and so on'
            ]
        ];

        return view("posts.index", ['posts' => $posts]);
    }

    public function show()
    {

        $post = [
            'id' => 0,
            'title' => "Sample Post",
            'description' => "Some description",
            "text" => 'This is a simple post with full description and so on and so on'
        ];

        return view("posts.show", ['post' => $post]);
    }
}
