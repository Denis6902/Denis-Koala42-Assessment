@extends("app")

@section("content")
    <h2 class="mb-3">Most recent</h2>
    <div class="most-recent">
        <div class="green-bg-color grid-two-columns mb-0 d-grid w-100">
            <p class="element text-white m-0 fs-6 fw-bold">
                <span>Temperature</span>
                <span>{{number_format($recent->temperature, 1)}} °C</span>
            </p>
            <p class="element text-white m-0 fs-6 fw-bold">
                <span>Humidity</span>
                <span>{{$recent->humidity}}</span>
            </p>
        </div>

        <div class="green-bg-color grid-five-columns d-grid w-100">
            <p class="element text-white m-0 fs-6 fw-bold">CO2 {{$recent->co2}}</p>
            <p class="element text-white m-0 fs-6 fw-bold">PM25 {{$recent->pm25}}</p>
            <p class="element text-white m-0 fs-6 fw-bold">PM10 {{$recent->pm10}}</p>
            <p class="element text-white m-0 fs-6 fw-bold">CH2O {{$recent->c2ho}}</p>
            <p class="element text-white m-0 fs-6 fw-bold">TVOC {{$recent->tvoc}}</p>
        </div>
    </div>

    <h2 class="mb-3 mt-5">Measurements</h2>
    <table class="table table-bordered measurments">
        <thead>
        <tr>
            <th class="text-white green-bg-color" scope="col">Time</th>
            <th class="text-white green-bg-color" scope="col">Temp.</th>
            <th class="text-white green-bg-color" scope="col">PM10</th>
            <th class="text-white green-bg-color" scope="col">PM25</th>
            <th class="text-white green-bg-color" scope="col">CH2O</th>
            <th class="text-white green-bg-color" scope="col">CO2</th>
            <th class="text-white green-bg-color" scope="col">Humidity</th>
            <th class="text-white green-bg-color" scope="col">TVOC</th>
            <th class="text-white green-bg-color" scope="col">HEX</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{\Carbon\Carbon::parse($item->date_created)->format('d.m.Y H:i:s')}}</td>
                <td>{{number_format($item->temperature, 1)}} °C</td>
                <td>{{$item->pm10}}</td>
                <td>{{$item->pm25}}</td>
                <td>{{$item->c2ho}}</td>
                <td>{{$item->co2}}</td>
                <td>{{$item->humidity}}</td>
                <td>{{$item->tvoc}}</td>
                <td>{{$item->HEX}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
