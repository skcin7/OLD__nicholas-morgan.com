<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ValidationRules\MyJsonValidation;
use Setting;
use Storage;

class SettingsController extends Controller
{
    /**
     * Save settings.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function saveSettings(Request $request)
    {
        $request->validate([
            'settings' => [
                'required',
                'string',
                (new MyJsonValidation()),
            ]
        ]);

        $json_formatted = json_encode(json_decode($request->get('settings')), JSON_PRETTY_PRINT);
        Storage::put('settings.json', $json_formatted);



//        $settings = json_decode(request('settings'));
//        Setting::forget('global');
//        Setting::set('global', json_encode($settings, JSON_NUMERIC_CHECK));
//        Setting::save();

        return redirect('admin')
            ->with('flash_message', [
                'message' => 'Settings have been saved!',
            ]);
    }

}
