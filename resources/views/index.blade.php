@extends('layout')
@section('content')
<h1>Flights</h1>
@foreach ($flights as $flight)
    <div>
        <a href="/flights/{{$flight->id}}">
            {{$flight->flight_number}}
        </a>
    </div>
@endforeach
@endsection