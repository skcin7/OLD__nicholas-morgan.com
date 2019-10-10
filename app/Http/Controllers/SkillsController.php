<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Show skills page.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSkills(Request $request)
    {
        return view('skills')
            ->with('title_prefix', 'Skills');
    }

}
