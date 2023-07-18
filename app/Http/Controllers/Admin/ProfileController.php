<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        
        if (isset($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
        auth()->guard('admin')->user()->update($data);
        return back()->with('msg', 'تم تحديث البيانات بنجاح');
    }
}
