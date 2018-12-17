<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    /**
     * Show the home page of the application.
     *
     * @return type
     */
    public function showHomepage()
    {
        return view('homepage')
            ->with('page_title', 'About • Nick Morgan');
    }

}
