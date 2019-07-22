<?php

namespace App\Http\Controllers;

class ContraController extends Controller
{
    /**
     * Play Contra!
     *
     * @return type
     */
    public function play()
    {
        return view('contra')
            ->with('title_prefix', 'Contra');
    }

}
