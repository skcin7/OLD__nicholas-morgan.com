<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ValidationRules\MyJsonValidation;
use Setting;

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
        $this->validate(request(), [
            'settings' => ['required', 'string', new MyJsonValidation()],
        ]);

        $settings = json_decode(request('settings'));
        Setting::forget('global');
        Setting::set('global', json_encode($settings, JSON_NUMERIC_CHECK));
        Setting::save();

        return redirect('admin')
            ->with('flash_message', [
                'message' => 'Settings have been saved!',
            ]);
    }

}
