<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    /**
     * Show the welcome page of the application.
     *
     * @return type
     */
    public function showWelcomePage()
    {
        return view('welcome')
            ->with('title_prefix', 'Welcome');
    }


}
