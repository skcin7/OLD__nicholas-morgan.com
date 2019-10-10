<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get a post by ID.
     *
     * @param $postID
     * @return mixed
     */
    protected function getPostByID($postID)
    {
        // In case the ID is in the format of a slug, the first segment of the
        // slug will be the ID. However, if it's not in the format of a
        // slug, the first segment will still be the ID.
        $postID = explode('-', $postID)[0];

        $post = Post::find($postID);
        abort_if(! $post, 404, 'Post can not be found.');
        return $post;
    }
}
