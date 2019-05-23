<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class The09629Controller extends Controller
{
    //
    function category(Request $request) {
        $tourism = $request->input('tourism');
        return $this->get_request('GetCategory?tourism='.$tourism);
    }

    function province(Request $request) {
        return $this->get_request('GetProvince');
    }

    function city(Request $request) {
        $provinceId = $request->input('province');        
        return $this->get_request('GetCity?province='.$provinceId);
    }

    function search(Request $request) {
        $text = $request->input('text');
        $category = $request->input('cat');
        $tourism = $request->input('tourism');
        $city = $request->input('city');
        return $this->get_request('GetSearch?tourism='.$tourism.'&cat='.$category.'&city='.$city.'&txtSearch='.$text);
    }

    function searchAll(Request $request) {
        $text = $request->input('text');
        return $this->get_request('GetAllSearch?txtSearch='.$text);
    }

    function get_request($url) {
        $client = new Client();
        $base_url = 'http://09629.ir/webservice/webservice1.asmx/';
        $res = $client->request('GET', $base_url . $url);
        $xml_str = $res->getBody();
        $xml = simplexml_load_string($xml_str);
        $json = json_encode($xml);
        return response($json)
                    ->header('Content-Type', 'application/json')
                    ->header('Access-Control-Allow-Origin', '*')
                    ->header('Access-Control-Allow-Methods', 'PUT, DELETE, POST, GET, OPTIONS');    
    }
}
