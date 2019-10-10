<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    /**
     * Show posts page.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPosts(Request $request)
    {
        return view('admin.posts')
            ->with('title_prefix', 'Posts');
    }

    /**
     * Show a post.
     *
     * @param Request $request
     * @param null $postID
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPost(Request $request, $postID = null)
    {
        if(! is_null($postID)) {
            $post = $this->getPostByID($postID);
        }
        else {
            $post = new Post();
        }

        return view('admin.post')
            ->with('title_prefix', $post->exists ? 'Edit Post' : 'Add Post')
            ->with('post', $post);
    }

    /**
     * Save a post.
     *
     * @param Request $request
     * @param null $postID
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function processPost(Request $request, $postID = null)
    {
        $request->validate([
            'subject' => 'required|string',
            'body' => 'required|string',
            'published' => 'nullable',
        ]);

        if (!is_null($postID)) {
            $post = $this->getPostByID($postID);

            if ($request->input('delete_post')) {
                $post->delete();

                return redirect('admin/posts')
                    ->with('flash_message', [
                        'message' => 'Post has been deleted!',
                    ]);
            }
        } else {
            $post = new Post();
        }

        $post->subject = $request->input('subject');
        $post->body = $request->input('body');
        $post->published = $request->input('published');
        $post->save();

        return redirect('admin/posts/' . $post->slug())
            ->with('flash_message', [
                'message' => 'Post has been saved!',
            ]);
    }

}
