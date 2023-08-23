@extends('layout')
@section('content')
<div class="container">
    <h1>Flights</h1>
    @foreach ($flights as $flight)
        <x-flight-card :flight="$flight" :select=true />
    @endforeach
</div>
@endsection