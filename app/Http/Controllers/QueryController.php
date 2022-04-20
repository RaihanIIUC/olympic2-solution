<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function qeuryByDate(Request $request)
    {
        $starts_at = date('Y-m-d', strtotime($request->start));
        $ends_at = date('Y-m-d', strtotime($request->end));

        $queryData = [
            "start_at" => $starts_at,
            "end_at" => $ends_at
        ];


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'olympic.mwebservices.co/api/query',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => \json_encode($queryData),
            CURLOPT_HTTPHEADER => array(
                'content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
}
