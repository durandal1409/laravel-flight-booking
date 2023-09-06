@props(['flight', 'select'])

    <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
            <h3>$300</h3>
            @if ($select)
              <a href="/flights/{{$flight->id}}" class='btn btn-warning btn-lg'>
                Select
              </a>
            @endif
          </div>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row g-1">
              <div class="col">{{$flight->airline}}</div>
              <div class="col">{{$flight->departure->format('M d Y')}}</div>
              <div class="col">{{$flight->departure->format('H:m A')}}</div>
              <div class="col">{{$flight->from}}</div>
            </div>
            <div class="row g-1">
              <div class="col">{{$flight->flight_number}}</div>
              <div class="col">{{$flight->arrival->format('M d Y')}}</div>
              <div class="col">{{$flight->arrival->format('H:m A')}}</div>
              <div class="col">{{$flight->to}}</div>
            </div>
          </div>
        </div>
    </div>