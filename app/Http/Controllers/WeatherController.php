<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{

    public function index(Request $request)
    {
        $uuid = $request->get('uuid');
        $city = $request->get('city');
        return response()->json(Weather::where('uuid', $uuid)->where('city', $city)->orderByDesc('created_at')->get());
    }

    public function store(Request $request)
    {
        $data = $request->only(['uuid', 'weather', 'city']);
        Weather::create($data);
    }
}
