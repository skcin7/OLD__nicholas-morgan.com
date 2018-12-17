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
            ->with('page_title', 'Posts • Nick Morgan')
            ->with('posts', $posts);
    }

    public function showPost($identifier)
    {
        $post = $this->getPostByIdentifier($identifier);

        return view('post')
            ->with('page_title', $post->subject)
            ->with('post', $post);
    }

}
