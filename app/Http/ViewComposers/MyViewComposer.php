<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
//use App\Repositories\UserRepository;
use Request;
use Setting;

class MyViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Make global settings available in all views:
//        $view->with('settings', json_decode(Setting::get('global')));
    }
}
