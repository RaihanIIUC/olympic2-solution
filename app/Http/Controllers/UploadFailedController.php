<?php

namespace App\Http\Controllers;

use App\Classes\Core;
use App\Models\Sms;
use Illuminate\Http\Request;

class UploadFailedController extends Controller
{


    public static  function  FailedIndex()
    {

        // pagination requirements
        // orwhere retry count is less than equal 5 requirements
        $sms = Sms::where('status', -1)->paginate(5) ?? 0;

        $total = count($sms) ?? 0;
        $no_count  = 1;

        return view('welcome', compact('sms', 'total','no_count'));
    }


    public  static function  FailsIndex()
    {

        // pagination requirements
        // orwhere retry count is less than equal 5 requirements
        $sms = Sms::where('status', -1)->paginate(5) ?? 0;

        $total = count($sms) ?? 0;
        $no_count  = 1;

        return view('welcome', compact('sms', 'total','no_count'));
    }

    public function updateFailedSms($smsid)
    {

        $sms = Sms::find($smsid);
        Core::smsInsertHander($sms);

        return   redirect()->back();
    }
    
    
    
    public function updateFailedSmsAll()
    {
         Core::FailedDataRePuller();
           UploadFailedController::FailsIndex();
           return redirect()->back();
    }
    
}
