<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Illuminate\Http\Request;

class SmsController extends Controller
{

    public  static function dataStoreProcess($item)
    {
        Sms::create([
            'applicationId' => $item['applicationId'],
            'message' => $item['message'],
            'sourceAddress' => $item['sourceAddress'],
            'requestId' => $item['requestId'],
            'created_at' => $item['created_at']
        ]);
    }

    public static function DataForOlympic2Handler($sms)
    {
        foreach ($sms as $head => $item) {
            SmsController::dataStoreProcess($item);
        }
        return dd($sms);
    }
}
