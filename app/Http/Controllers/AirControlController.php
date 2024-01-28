<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class AirControlController
{
    private Client $client;

    function __construct()
    {
        $this->client = new Client([
                'base_uri' => env('API_URL'),
                'headers' =>
                    [
                        'Authorization' => "Bearer " . env('API_TOKEN')
                    ]
            ]
        );
    }

    function index()
    {
        return view('AirControl.index', [
            "recent" => $this->getRecentData(),
            "data" => $this->getData()
        ]);
    }

    function getRecentData(string $sort = "sort,-date_updated,-date_created"): object
    {
        $responseRecent = $this->client->get(
            '/items/measurments?limit=1' . '&sort=' . $sort
        )->getBody();

        return json_decode($responseRecent)->data[0];
    }

    function getData(int $limit = 20, int $offset = 1, string $sort = "sort,-date_updated,-date_created"): array
    {
        $responseData = $this->client->get(
            '/items/measurments?offset=' . $offset . '&limit=' . $limit . '&sort=' . $sort
        )->getBody();

        return json_decode($responseData)->data;
    }
}
