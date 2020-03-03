<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use View;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function makeRequest(Request $request){

        $client = new Client();
        $res = $client->request('GET', 'https://api.yelp.com/v3/autocomplete',[
            'headers' => [
                'Authorization' => 'Bearer jgRVnIJ15A500fx2riRdGRCdoBKoE6f0PhR3IoXZWsIRtXk8CvxeA-F4uVp26HUNmkz5uDxUr81dWNAlHp5IdjlxO_5arZDE2eKYwc7_nZ2d-Trxq4hoJdCTebtNXnYx'
            ],
            'query' => [
                'text' => $request['text'],
                'latitude' => '32.998315143326856',
                'longitude' => '-96.77489266061392'
            ]
        ]);
        $body = $res->getBody();

        return ($body);
    }

    public function findBusiness(Request $request){
        $client = new Client();

        $res = $client->request('GET', 'https://api.yelp.com/v3/businesses/search',[
            'headers' => [
                'Authorization' => 'Bearer jgRVnIJ15A500fx2riRdGRCdoBKoE6f0PhR3IoXZWsIRtXk8CvxeA-F4uVp26HUNmkz5uDxUr81dWNAlHp5IdjlxO_5arZDE2eKYwc7_nZ2d-Trxq4hoJdCTebtNXnYx'
            ],
            'query' => [
                'term' => $request['text'],
                'latitude' => $request['lat'],
                'longitude' => $request['lng']
            ]
        ]);
        $body = $res->getBody();
        $body = json_decode($body->getContents());
        
        $query = [
            'term' => $request['text'],
            'latitude' => $request['lat'],
            'longitude' => $request['lng']
        ];

        return View::make('find')->with(['data' => $body->businesses, 'query'=> $query]);

    }
}
