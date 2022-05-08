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
        $sms = Sms::where('status', -1)->get();

        $count = count($sms);

        return view('welcome', compact('sms', 'count'));
    }


    public function updateFailedSms($smsid)
    {

        $sms = Sms::find($smsid);
        Core::smsInsertHander($sms);

        return   redirect()->back();
    }
}
