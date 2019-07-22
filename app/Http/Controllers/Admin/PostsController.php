<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    /**
     * Show Posts page.
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPosts()
    {
        return view('admin.posts')
            ->with('title_prefix', 'Posts');
    }

    /**
     * Show a post.
     * @param null $identifier
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPost($identifier = null)
    {
        if(isset($identifier)) {
            $post = $this->getPostByIdentifier($identifier);
        }
        else {
            $post = new Post();
        }

        return view('admin.post')
            ->with('title_prefix', 'Post')
            ->with('post', $post);
    }

    /**
     * Process a post.
     * @param null $identifier
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function processPost($identifier = null)
    {
        $this->validate(request(), [
            'subject' => 'required|string',
            'body' => 'required|string',
            'published' => 'nullable',
        ]);

        if($identifier) {
            $post = $this->getPostByIdentifier($identifier);

            if(request('delete')) {
                $post->delete();
                return $this->generateRedirectResponse('deleted', $post);
            }
        }
        else {
            $post = new Post();
        }

        $post->subject = request('subject');
        $post->body = request('body');
        $post->published = (bool) request('published');
        $post->save();

        if(! $post->wasRecentlyCreated) {
            return $this->generateRedirectResponse('saved', $post);
        }

        return $this->generateRedirectResponse('created', $post);
    }

    /**
     * Generate the redirected HTTP response.
     * @param string $verb
     * @param null $post
     * @return \Illuminate\Http\RedirectResponse
     */
    private function generateRedirectResponse($verb = 'created', $post = null)
    {
        return redirect($verb !== 'deleted' ? 'admin/posts/' . $post->id : 'admin/posts')
            ->with('flash_message', [
                'message' => '[<code>' . $post->id . '</code>] <strong>' . $post->subject . '</strong> - has been ' . $verb . '!',
            ]);
    }

}
