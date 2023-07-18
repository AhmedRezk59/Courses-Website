<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        $settings = DB::table('website_settings')->first();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = DB::table('website_settings')->first();
        if (isset($settings) > 0) {
            DB::table('website_settings')->update([
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'contact_mail' => $request->contact_mail,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
            ]);
        } else {
            DB::table('website_settings')->insert([
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'contact_mail' => $request->contact_mail,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
            ]);
        }
        return back()->with('msg', 'تم تحديث البيانات بنجاح');
    }
}
