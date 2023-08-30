@extends('layout')
@section('content')

<div class="container booking-form-container">
<h3>Your flight from {{$flight[0]->from}} to {{$flight[0]->to}}</h3>
<x-flight-card :flight="$flight[0]" :select='false'/>

{{-- reservation form --}}
<form method="post" action='/reservation/{{$flight[0]->id}}' class='mb-3'>
    @csrf
    <label for="fname" class="">First Name</label>
    <input type="text" name="fname" id="fname" class="form-control" value="{{old('fname')}}" /><br>
    @error('fname')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <label for="lname" class="">Last Name</label>
    <input type="text" name="lname" id="lname" class="form-control" value="{{old('lname')}}" /><br>
    @error('lname')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <label for="email" class="">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" /><br>
    @error('email')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
            <div class="row justify-content-between mb-3">
                <label>Seat</label>
                @foreach ($seats as $seat)
                    @php
                        // check if seat is reserved
                        if (in_array($seat->id, $seat_ids_in_reservations))
                            $reserved = true;
                        else
                            $reserved = false;
                    @endphp
                    <div class="col-3 m-3 p-2 seat {{$reserved ? 'reserved-seat' : 'available-seat'}}">
                        <div class="form-check {{$reserved ? 'disabled' : ''}}">
                            <input class="form-check-input" type="radio" name="seat_id" value={{$seat->id}} id={{$seat->id}} {{$reserved ? 'disabled' : ''}}/>
                            <label class="form-check-label" for={{$seat->id}}>{{$seat->seat_number}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
    @error('seat_id')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <button class="btn btn-warning btn-lg" type="submit" >Submit</button>
</form>
</div>
@endsection