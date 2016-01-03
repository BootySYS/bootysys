<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

class DistributionServerController extends Controller
{
    public function time()
    {
        $client = new Client([
            'base_uri' => config('bootysys.base_url'),
            'timeout' => 2.0
        ]);

        $professor = Professor::all();

        $req = $client->request('POST', '/time', [
            'json' => [
                'professors' => $professor
            ]
        ]);

        return collect([
            'body' => $req->getBody()->getContents()
        ]);

    }
}
