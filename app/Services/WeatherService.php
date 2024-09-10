<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('WEATHERBIT_API_KEY');
    }

    public function getWeeklyForecast($lat, $lon)
    {
        $response = Http::get('https://api.weatherbit.io/v2.0/forecast/daily', [
            'lat' => $lat,
            'lon' => $lon,
            'key' => $this->apiKey,
            'units' => 'M',
            'days' => 7, // Mengambil prakiraan cuaca selama 7 hari
        ]);

        return $response->json();
    }
}
