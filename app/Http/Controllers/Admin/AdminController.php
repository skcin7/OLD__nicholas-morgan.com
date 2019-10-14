<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Setting;

class AdminController extends Controller
{
    /**
     * Show the admin home page.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminHome(Request $request)
    {
        return view('admin.home')
            ->with('title_prefix', 'Admin');
    }

    /**
     * Show the misc page.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMisc(Request $request)
    {
        return view('admin.misc')
            ->with('title_prefix', 'Misc');
    }

    /**
     * Save misc.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saveMisc(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string',
        ]);

        Setting::forget('bio');
        Setting::set('bio', (string) $request->input('bio'));
        Setting::save();

        return redirect('admin/misc')
            ->with('flash_message', [
                'message' => 'Misc info saved!'
            ]);
    }

}
