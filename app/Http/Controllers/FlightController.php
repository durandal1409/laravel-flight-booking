<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    //show all flights
    public function index() {
        $flights = new Flight();
        return view('index', ['flights' => $flights->all()]);
    }

    // show single flight
    public function show (Request $request, $flight) {
        $seats = new Seat();
        $reservations = new Reservation();
        return view('show', [
            'flight' => $flight,
            'seats' => $seats->all(),
            'reservations' => $reservations->where('flight_id', $flight)->get()
        ]);
    }

    // store new reservation
    public function store(Request $request) {
        // TODO:
        // save passenger, flight and seat ids instead
        $formFields = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => ['required', 'email'],
            'seat' => 'required'
        ]);

        Reservation::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
