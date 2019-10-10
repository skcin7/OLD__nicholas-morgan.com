<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class AdminController extends Controller
{
    /**
     * Show the admin home page.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminHome(Request $request)
    {
        return view('admin.home')
            ->with('title_prefix', 'Admin');
    }

}
