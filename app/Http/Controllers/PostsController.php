<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Show the posts page.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPosts(Request $request)
    {
        $posts = Post::where('published', true)->orderBy('created_at', 'desc')->get()->groupBy(function($item) {
            return $item->created_at->format('Y');
        });

        return view('posts')
            ->with('title_prefix', 'Posts')
            ->with('posts', $posts);
    }

    /**
     * Show a post.
     *
     * @param Request $request
     * @param $postID
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPost(Request $request, $postID)
    {
        $post = $this->getPostByID($postID);

        return view('post')
            ->with('title_prefix', $post->subject)
            ->with('post', $post);
    }

}
