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

        $preparedResponse = curl_exec($curl);

        $response = json_decode($preparedResponse, true);

        curl_close($curl);
        return $response;
    }


    public static function StatusUpdateHandler($sendChecker, $sms)
    {
        $statusCode =
            $sendChecker['statusCode'];


        if ($statusCode == 'S1000') {
            echo 'win';

            return   $sms->update([
                'status' => 1
            ]);
        } else {
            echo 'failed';

            return  $sms->update([
                'status' => -1
            ]);
        }
    }


    public static function DataCollectors()
    {
        $smses =  Sms::where('status', '0')->get();

        foreach ($smses as $key => $sms) {
            $sanitizedData =    Core::formatHandler($sms);
            $sendChecker =     Core::sendRequest($sanitizedData);
            Core::StatusUpdateHandler($sendChecker, $sms);
        }
    }
}
