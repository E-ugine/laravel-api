<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $incomingRequest = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);

        $incomingRequest['title'] = strip_tags($incomingRequest['title']);
        $incomingRequest['content'] = strip_tags($incomingRequest['content']);
        $incomingRequest['user_id'] = auth('web')->user()->id;

        Post::create($incomingRequest);

        return redirect('/')->with('success', 'Post created successfully');


    }
}
