<?php

namespace App\Http\Controllers;

use App\Models\HairStyle;
use Illuminate\Http\Request;

class HairStyleController extends Controller
{
    public function index()
    {
        $hairstyles = HairStyle::limit(6)->get();

        return view('pages.hair_style', compact('hairstyles'));
    }
}
