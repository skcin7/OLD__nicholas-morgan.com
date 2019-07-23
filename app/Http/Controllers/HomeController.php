<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showHomePage()
    {
        return view('home')
            ->with('title_prefix', 'Home');
    }

}
