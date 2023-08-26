<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Currency;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nafezly\Payments\Classes\PaymobPayment;
use Nafezly\Payments\Classes\PaymobWalletPayment;

class JoinCourseController extends Controller
{
    public function pay(Course $course)
    {
        $price = 0;

        if (isset($course->discount_price)) {
            $discount_date = Carbon::createFromFormat('Y-m-d', $course->end_discount_date);
            $now = Carbon::now();
            if ($discount_date->gte($now)) {
                $price =  $course->discount_price;
            } else {
                $price = $course->price;
            }
        } else {
            $price = $course->price;
        }


        $currency = Currency::where('code', 'EGP')->first();
        $currency_rate = $currency->rate;
        $price = $price * $currency_rate;
        $payment = new PaymobPayment();
        $arr = $payment->setUserId(auth()->user()->id)
            ->setUserFirstName(auth()->user()->first_name)
            ->setUserLastName(auth()->user()->last_name)
            ->setUserEmail(auth()->user()->email)
            ->setCurrency('EGP')
            ->setUserPhone(auth()->user()->phone_number)
            ->setAmount($price)
            ->pay();
        Payment::create([
            'course_id' => $course->id,
            'user_id' => auth()->user()->id,
            'currency' => $currency->code,
            'order_id' => $arr['payment_id'],
            'amount' => $price
        ]);
        return redirect()->away($arr['redirect_url']);
    }

    public function payWallet(Course $course)
    {
        $price = 0;

        if (isset($course->discount_price)) {
            $discount_date = Carbon::createFromFormat('Y-m-d', $course->end_discount_date);
            $now = Carbon::now();
            if ($discount_date->gte($now)) {
                $price =  $course->discount_price;
            } else {
                $price = $course->price;
            }
        } else {
            $price = $course->price;
        }


        $currency = Currency::where('code', 'EGP')->first();
        $currency_rate = $currency->rate;
        $price = $price * $currency_rate;
        $payment = new PaymobWalletPayment();
        $arr = $payment->setUserId(auth()->user()->id)
            ->setUserFirstName(auth()->user()->first_name)
            ->setUserLastName(auth()->user()->last_name)
            ->setUserEmail(auth()->user()->email)
            ->setCurrency('EGP')
            ->setUserPhone(auth()->user()->phone_number)
            ->setAmount($price)
            ->pay();
        Payment::create([
            'course_id' => $course->id,
            'user_id' => auth()->user()->id,
            'currency' => $currency->code,
            'order_id' => $arr['payment_id'],
            'amount' => $price
        ]);
        return redirect()->away($arr['redirect_url']);
    }

    public function noPay(Course $course)
    {
        abort_if($course->is_paid == true, 403);
        auth()->user()->courses()->attach($course->id);
        return to_route('courses.course.contents', $course);
    }

    public function payment_verify(Request $request, $payment = null)
    {
        $payment = new PaymobPayment();
        $arr = $payment->verify($request);
        if ($arr['success'] == true) {
            try {
                DB::beginTransaction();
                $payment = Payment::where('order_id', $arr['payment_id'])->first();
                $payment->is_successful = true;
                $payment->save();
                DB::table('course_user')->insert([
                    'user_id' => $payment->user_id,
                    'course_id' => $payment->course_id
                ]);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
            }
           
            return to_route('courses.course.contents', $payment->course_id);
        } else{
            abort(403,'مف فضلك تأكد من صحة رقم الهاتف المحمول');
        }
    }
}
