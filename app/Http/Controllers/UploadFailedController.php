<?php

namespace App\Http\Controllers;

use App\Classes\Core;
use App\Models\Sms;
use Illuminate\Http\Request;

class UploadFailedController extends Controller
{


    public function FailedIndex()
    {

        // pagination requirements
        // orwhere retry count is less than equal 5 requirements
        $sms = Sms::where('status', -1)->latest();

        return view('welcome', compact('sms'));
    }


    public function updateFailedSms(Request $request, Sms $sms)
    {
        Core::smsInsertHander($sms);
    }
}
