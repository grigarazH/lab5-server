<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;
use App\Models\SeasonImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function descriptions(Request $request)
    {
        $query = Season::query();
        if ($season = $request->get('season')) {
            $query = $query->where('season', $season);
        }
        return response()->json($query->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_descriptions()
    {
        return view('season_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_descriptions(Request $request)
    {
        $data = $request->only(['description', 'season']);
        Season::create($data);
    }

    public function images(Request $request)
    {
        $query = SeasonImage::query();
        if ($season = $request->get('season')) {
            $query = $query->where('season', $season);
        }
        return response()->json($query->get(), options: JSON_UNESCAPED_SLASHES);
    }

    public function create_images()
    {
        return view('season_images_create');
    }

    public function store_images(Request $request)
    {
        $data = $request->only(['season']);
        $path = $request->file('image_file')->getRealPath();
        $data['image'] = base64_encode(file_get_contents($path));
        SeasonImage::create($data);
    }
}
