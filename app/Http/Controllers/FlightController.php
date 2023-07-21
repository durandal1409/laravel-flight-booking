<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightController extends Controller
{
    //show all flights
    public function index() {
        return view('index');
    }

    // show single flight
    public function show () {
        return view('show');
    }
}
