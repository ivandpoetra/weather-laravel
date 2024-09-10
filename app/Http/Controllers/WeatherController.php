<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index(Request $request)
    {
        // Lokasi default (Jakarta)
        $lat = $request->input('lat', '-6.2088');
        $lon = $request->input('lon', '106.8456');
        $selectedDate = $request->input('date');

        $data = $this->weatherService->getWeeklyForecast($lat, $lon);

        return view('index', [
            'data' => $data,
            'selectedDate' => $selectedDate
        ]);
    }
}
