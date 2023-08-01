<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Flight;
use App\Models\Passenger;
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
    public function show ($flight_id) {
        $seats = new Seat();
        $flights = new Flight();
        $reservations = new Reservation();
        return view('show', [
            'flight' => $flights->where('id', $flight_id)->get(),
            'seats' => $seats->all(),
            'reservations' => $reservations->where('flight_id', $flight_id)->get()
        ]);
    }

    // store new reservation
    public function store(Request $request, $flight_id) {
        // TODO:
        // save passenger, flight and seat ids instead
        $formFields = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => ['required', 'email'],
            'seat' => 'required'
        ]);

        $request->merge(['flight' => $flight_id]);
        dd($request);

        Reservation::create([
            'passenger_id' => '5',
            'flight_id' => '6',
            'seat_id' => $formFields['seat']
        ]);
        // $passenger = Passenger::firstOrCreate(
        //     ['email' => 'r@k.gmail.com'],
        //     ['fname' => 'jj', 'lname' => 'll']
        // );

        return redirect('/'); //->with('message', 'Reservation created successfully!');
    }
}
