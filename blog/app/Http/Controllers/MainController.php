<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function makeRequest(){

        $client = new Client();
        $res = $client->request('GET', 'https://api.yelp.com/v3/businesses/9EJT2pRIRmCKoQOVuQWx1g',[
            'headers' => [
                'Authorization' => 'Bearer jgRVnIJ15A500fx2riRdGRCdoBKoE6f0PhR3IoXZWsIRtXk8CvxeA-F4uVp26HUNmkz5uDxUr81dWNAlHp5IdjlxO_5arZDE2eKYwc7_nZ2d-Trxq4hoJdCTebtNXnYx'
            ]
        ]);
        $body = $res->getBody();

        dd(json_decode($body->getContents()));

    }
}
