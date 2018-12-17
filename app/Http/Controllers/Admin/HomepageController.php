<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ValidationRules\MyJsonValidation;
use Setting;

class HomepageController extends Controller
{
    /**
     * Show the home page of the application.
     *
     * @return type
     */
    public function showHomepage()
    {
        return view('admin.homepage')
            ->with('title_prefix', 'Admin');
    }

    public function saveGlobalSettings()
    {
        $this->validate(request(), [
            'settings' => ['required', 'string', new MyJsonValidation()],
        ]);

        $settings = json_decode(request('settings'));
        Setting::forget('global');
        Setting::set('global', json_encode($settings, JSON_NUMERIC_CHECK));
        Setting::save();

        return redirect('admin')
            ->with('flash_message', [
                'message' => 'Global settings have been saved!',
            ]);
    }

}
