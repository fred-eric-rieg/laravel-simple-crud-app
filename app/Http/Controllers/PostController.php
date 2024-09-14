<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $postFields = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $postFields['title'] = strip_tags($postFields['title']);
        $postFields['content'] = strip_tags($postFields['content']);
        $postFields['user_id'] = Auth::id();
        Post::create($postFields);
        return redirect('/');
    }
}
