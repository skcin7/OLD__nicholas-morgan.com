<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    /**
     * Show Skills Page.
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function showSkillsPage()
    {
        return view('skills')
            ->with('title_prefix', 'Skills');
    }

}
