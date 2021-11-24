<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {


        return view('dashboard.dashboard');
    }

    public function getReponse()
    {
        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => '192.168.2.8:9200/_search?size=5000&pretty=true',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "_source": ["source.ip", "destination.ip", "suricata.eve.alert.signature", "http.request", "http.response", "user_agent","@timestamp"],
                "query": {
                    "exists": {
                        "field": "suricata.eve.alert.signature"
                    }
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $result = json_decode($response, true);

            return response()->json($result);
    }

    public function getReponseTable()
    {
        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => '192.168.2.8:9200/_search?size=5000&pretty=true',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "_source": ["source.ip", "destination.ip", "suricata.eve.alert.signature", "http.request", "http.response", "user_agent","@timestamp"],
                "query": {
                    "exists": {
                        "field": "suricata.eve.alert.signature"
                    }
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $result = json_decode($response, true);
            $arr = $result['hits'];

            $resource = $result['hits'];



            // foreach($resource as $key => $val)
            // {
            //     dd($val);
            // }
            // dd($resource);

            return response()->json($arr);
    }
}
