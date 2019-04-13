<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Xhat\Payjs\Facades\Payjs;

class PaymentController extends Controller
{
    public function store()
    {
        $payment = Payment::create([
            'trade_no' => time().rand(9999,100000),
            'subject' => '给学网订单',
            'amount' => 200 // 100
        ]);

        $data = [
            'body' => $payment->subject,                                // 订单标题
            'total_fee' => $payment->amount,                                   // 订单标题
            'out_trade_no' => $payment->trade_no,                           // 订单号
            'notify_url' => 'https://demopay.geixue.com/notify/wechat',     // 异步通知地址(可选参数)
        ];

        $response =  Payjs::native($data);

        return [
            'url' => $response['code_url'],
            'trade_no' => $payment->trade_no,
        ];
    }

    public function check()
    {
        $payment = Payment::where('trade_no',request('trade_no'))
            ->first();

        if (is_null($payment)) {
            return ['paid' => false];
        }

        if ($payment->paid()) {
            return ['paid' => true];
        }

        return ['paid' => false];
    }

    public function mike()
    {
        $payment = Payment::create([
            'trade_no' => time().rand(9999,100000),
            'subject' => '给学网 Mike 订单',
            'amount' => 300 // 100
        ]);

        return view('mike',compact('payment'));
    }

    public function mikecrm()
    {
        // notify
        $signature = request()->header('X-GEIXUE-SIGNATURE');

        if ($signature === md5(config('services.geixue.key'))) {

            $data = request()->all();

            $payment = Payment::where('trade_no',$data['trade_no'])->first();

            if (is_null($payment)) {
                exit();
            }

            if ($payment->paid()) {
                exit();
            }

            $payment->is_paid = 'T';
            $payment->paid_at = now();
            $payment->save();

            return 'success';
        }

        return 'failed';
    }

    public function notify()
    {
        $data = Payjs::notify();

        $payment = Payment::where('trade_no',$data['out_trade_no'])->first();

        if (is_null($payment)) {
            exit();
        }

        if ($payment->paid()) {
            exit();
        }

        if ($data['return_code'] == 1) {
            $payment->is_paid = 'T';
            $payment->paid_at = now();
            $payment->save();

            return 'success';
        }
    }
}
