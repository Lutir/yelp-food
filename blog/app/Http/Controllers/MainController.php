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
        $lat = ($request['lat'] != null)?($request['lat']):(32.781105);
        $lng = ($request['lng'] != null)?($request['lng']):(-96.798871); 
        $res = $client->request('GET', 'https://api.yelp.com/v3/businesses/search',[
            'headers' => [
                'Authorization' => 'Bearer jgRVnIJ15A500fx2riRdGRCdoBKoE6f0PhR3IoXZWsIRtXk8CvxeA-F4uVp26HUNmkz5uDxUr81dWNAlHp5IdjlxO_5arZDE2eKYwc7_nZ2d-Trxq4hoJdCTebtNXnYx'
            ],
            'query' => [
                'term' => $request['text'],
                'latitude' => $lat,
                'longitude' => $lng
            ]
        ]);
        $body = $res->getBody();
        $body = json_decode($body->getContents());
        
        $query = [
            'term' => $request['text'],
            'latitude' => $lat,
            'longitude' => $lng
        ];

        $sort_param = 'best_match';

        return View::make('find')->with(['data' => $body->businesses, 'query'=> $query, 'sort_param' => $sort_param]);

    }

    public function sortBusiness(Request $request){

        $query = json_decode($request['query']);

        $client = new Client();

        $lat = ($query->latitude != null)?($query->latitude):(32.781105);
        $lng = ($query->longitude != null)?($query->longitude):(-96.798871); 
        $res = $client->request('GET', 'https://api.yelp.com/v3/businesses/search',[
            'headers' => [
                'Authorization' => 'Bearer jgRVnIJ15A500fx2riRdGRCdoBKoE6f0PhR3IoXZWsIRtXk8CvxeA-F4uVp26HUNmkz5uDxUr81dWNAlHp5IdjlxO_5arZDE2eKYwc7_nZ2d-Trxq4hoJdCTebtNXnYx'
            ],
            'query' => [
                'term' => $query->term,
                'latitude' => $lat,
                'longitude' => $lng,
                'sort_by' => $request['type'] 
            ]
        ]);
        $body = $res->getBody();
        $body = json_decode($body->getContents());
        
        $query = [
            'term' => $query->term,
            'latitude' => $lat,
            'longitude' => $lng
        ];

        $sort_param = $request['type'];

        return View::make('find')->with(['data' => $body->businesses, 'query'=> $query, 'sort_param' => $sort_param]);
    }
}
