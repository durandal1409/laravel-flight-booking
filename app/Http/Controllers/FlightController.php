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
        // dd($reservations->where('flight_id', $flight_id)->pluck('seat_id'));
        return view('show', [
            'flight' => $flights->where('id', $flight_id)->get(),
            'seats' => $seats->all(),
            'seat_ids_in_reservations' => $reservations->where('flight_id', $flight_id)->pluck('seat_id')->toArray()
        ]);
    }

    // store new reservation
    public function store(Request $request, $flight_id) {
        $formFields = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => ['required', 'email'],
            'seat_id' => 'required'
        ]);

        $request->merge(['flight_id' => $flight_id]);

        $passenger = Passenger::firstOrCreate(
            ['email' =>  request('email')],
            ['fname' => request('fname'),
            'lname' => request('lname')]
        );

        Reservation::create([
            'passenger_id' => $passenger->id,
            'flight_id' => $flight_id,
            'seat_id' => $request->seat_id
        ]);

        return redirect('/'); //->with('message', 'Reservation created successfully!');
    }
}
