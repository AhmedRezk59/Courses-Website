<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function join()
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);
        $subscriber = Subscriber::where('email', request()->email)->first();
        if (!isset($subscriber)) {
            Subscriber::create([
                'email' => request()->email
            ]);
        }
        return back()->with('msg' , 'لقد اشتركت فى القائمة البريدية بنجاح');
    }
}
