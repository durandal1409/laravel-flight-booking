@include('layout')
<span>{{$flight[0]->flight_number}}</span>

<form method="post" action='/reservation/{{$flight[0]->id}}' class='mb-3'>
    @csrf
    <label for="fname" class="">First Name</label>
    <input type="text" name="fname" id="fname" class="form-control" value="{{old('fname')}}" /><br>
    @error('fname')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    <label for="lname" class="">Last Name</label>
    <input type="text" name="lname" id="lname" class="form-control" value="{{old('lname')}}" /><br>
    @error('lname')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    <label for="email" class="">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" /><br>
    @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    <div>
        @foreach ($seats as $seat)
            <input class="btn sm btn-outline-secondary" type="radio" name="seat" value={{$seat->seat_number}}  id={{$seat->seat_id}} />
            <label for={{$seat->seat_id}}>{{$seat->seat_number}}</label>
        @endforeach
    </div>
    <button class="btn btn-primary outlined" type="submit" >Submit</button>
</form>
