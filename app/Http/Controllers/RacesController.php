<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;

class RacesController extends Controller
{
    public function index()
    {
        $races = Race::all();
        return $races;
    }
}
