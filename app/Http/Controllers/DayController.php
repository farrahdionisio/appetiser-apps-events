<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
class DayController extends Controller
{
    public function index()
    {
        $days = Day::all();
        return response()->json($days); 
    }
}
