<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the welcome page of the application.
     * 
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWelcome(Request $request)
    {
        return view('welcome')
            ->with('title_prefix', 'Welcome');
    }


}
