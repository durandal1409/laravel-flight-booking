@props(['flight', 'select'])

    <div class="card mb-4">
        <div class="card-header">
          <div class="card-header-flex">
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
            <div class="row">
              <div class="col-sm">{{$flight->airline}}</div>
              <div class="col-sm">{{$flight->departure->format('M d Y')}}</div>
              <div class="col-sm">{{$flight->departure->format('H:m A')}}</div>
              <div class="col-sm">{{$flight->from}}</div>
            </div>
            <div class="row">
              <div class="col-sm">{{$flight->flight_number}}</div>
              <div class="col-sm">{{$flight->arrival->format('M d Y')}}</div>
              <div class="col-sm">{{$flight->arrival->format('H:m A')}}</div>
              <div class="col-sm">{{$flight->to}}</div>
            </div>
          </div>
        </div>
    </div>