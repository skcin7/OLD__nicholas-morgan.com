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

    protected function getPostByIdentifier($postIdentifier)
    {
        $post = Post::find(explode('-', $postIdentifier)[0]);
        abort_if(! $post, 404, 'Post can not be found.');
        return $post;
    }
}
