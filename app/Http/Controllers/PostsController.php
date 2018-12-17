<?php

namespace App\Http\Controllers;

use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Show the home page of the application.
     *
     * @return type
     */
    public function showAllPosts()
    {
        $posts = Post::where('published', true)->orderBy('created_at', 'desc')->get()->groupBy(function($item) {
            return $item->created_at->format('Y');
        });

        return view('posts')
            ->with('title_prefix', 'Posts')
            ->with('posts', $posts);
    }

    public function showPost($identifier)
    {
        $post = $this->getPostByIdentifier($identifier);

        return view('post')
            ->with('title_prefix', $post->subject)
            ->with('post', $post);
    }

}
