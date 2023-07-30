<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        $settings = DB::table('website_settings')->first();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'banner' => ['sometimes', 'nullable', 'image'],
            'courses_cover' => ['sometimes', 'nullable', 'image'],
            'waited_lectures_name' => ['sometimes', 'nullable', 'string'],
            'current_lectures_name' => ['sometimes', 'nullable', 'string'],
            'student' => ['required', 'string'],
            'student_image' => ['sometimes', 'nullable', 'image'],
            'employee' => ['required', 'string'],
            'employee_image' => ['sometimes', 'nullable', 'image'],
            'job_searcher' => ['required', 'string'],
            'job_searcher_image' => ['sometimes', 'nullable', 'image'],
            'knowledge_seeker' => ['required', 'string'],
            'knowledge_seeker_image' => ['sometimes', 'nullable', 'image'],
            'seen_lectures' => ['required', 'string'],
            'seen_lectures_image' => ['sometimes', 'nullable', 'image'],
            'training' => ['required', 'string'],
            'training_image' => ['sometimes', 'nullable', 'image'],
            'certificates' => ['required', 'string'],
            'certificates_image' => ['sometimes', 'nullable', 'image'],
            'community' => ['required', 'string'],
            'community_image' => ['sometimes', 'nullable', 'image'],
        ]);
        $settings = DB::table('website_settings')->first();
        $data = [
            'waited_lectures_name' => $request->waited_lectures_name,
            'current_lectures_name' => $request->current_lectures_name,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'contact_mail' => $request->contact_mail,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram,
            'student' => $request->student,
            'employee' => $request->employee,
            'job_searcher' => $request->job_searcher,
            'knowledge_seeker' => $request->knowledge_seeker,
            'seen_lectures' => $request->seen_lectures,
            'training' => $request->training,
            'certificates' => $request->certificates,
            'community' => $request->community,
        ];
       
        $images = [
            'banner',
            'courses_cover',
            'student_image',
            'employee_image',
            'job_searcher_image',
            'knowledge_seeker_image',
            'seen_lectures_image',
            'training_image',
            'certificates_image',
            'community_image',
        ];
        foreach($images as $image){
            if (isset($request->{$image})) {
                if (isset($settings->{$image})) {
                    Storage::disk('public')->delete('images/',$settings->{$image});
                }
                Storage::disk('public')->put('/images/', $request->file($image));
                $data[$image] = $request->file($image)->hashName();
            }
        }
        if (isset($settings) > 0) {
            DB::table('website_settings')->update($data);
        } else {
            DB::table('website_settings')->insert($data);
        }
        return back()->with('msg', 'تم تحديث البيانات بنجاح');
    }
}
