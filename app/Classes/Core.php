<?php

namespace App\Classes;

use App\Models\Sms;

class Core
{

    public static function formatHandler($sms)
    {
        $queryData = [
            "version" => "1.0",
            "applicationId" => $sms->applicationId,
            "sourceAddress" => $sms->sourceAddress,
            "message" => $sms->message,
            "requestId" => $sms->requestId,
            "encoding" => "0"
        ];
        return $queryData;
    }


    public static function sendRequest($jsonStream)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1:9002/api/sms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => \json_encode($jsonStream),
            CURLOPT_HTTPHEADER => array(
                'content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    public static function DataCollectors()
    {
        $smses =  Sms::where('status', '0')->get();

        foreach ($smses as $key => $sms) {
            $sanitizedData =    Core::formatHandler($sms);
            $sendChecker =     Core::sendRequest($sanitizedData);

            // if ($sendChecker) {
            //     // update status = 1
            // } else {
            //     // update status = -1
            //     // also update retry count
            // }
        }
        return $smses;

        // $sanitizedData =    Core::formatHandler($smses);
        // return Core::sendRequest($sanitizedData);
    }
}
