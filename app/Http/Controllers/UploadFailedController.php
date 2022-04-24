<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Illuminate\Http\Request;

class UploadFailedController extends Controller
{


    public function FailedIndex()
    {

        // pagination requirements
        // orwhere retry count is less than equal 5 requirements
        $sms = Sms::where('status', -1)->pagination(5);
        return view('welcome', compact('sms'));
    }


    public function updateFailedSms(Request $request, Sms $sms)
    {
        $retry  = ++$sms->retry_count;
        $sms->update([
            'retry_count' => $retry,
        ]);
    }
}
