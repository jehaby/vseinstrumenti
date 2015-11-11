<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Trip;
use App\Courier;
use App\Region;
use App\TripFactory;


class MainController extends Controller
{


    public function getIndex()
    {
        return view('schedule')->with('schedules', Trip::all());  // TODO: lazy loading!
    }


    public function getForm()
    {
        return view('add-trip', [
            'couriers' => Courier::all(),
            'regions' => Region::all(),
            'today' => Carbon::today()->toDateString()
        ]);
    }


    public function postForm(Request $request)
    {
        dd($request->all());
    }


    public function getAvailableCouriersAndDates(Request $request)
    {

        $regions = Region::all();
        $regionId = $request->get('region_id');

        $departureDate = Carbon::createFromFormat('Y-m-d', $request->get('departure_date'));

        $arrivalDate = clone $departureDate;
        $arrivalDate = $arrivalDate->addHours($regions->find($regionId)->time_to);

        $returnDate = clone $arrivalDate;
        $returnDate->addHours($regions->find($regionId)->time_back);

        $courierIds = $this->getAvailableCouriers($departureDate, $returnDate);

        return json_encode([
            'arrival_date' => $arrivalDate->toDateString(),
            'return_date'  => $returnDate->toDateString(),
            'available_couriers' => $this->getAvailableCouriers($departureDate, $returnDate)
        ]);


    }


    private function getAvailableCouriers($departureDate, $returnDate)
    {

        return \DB::table('trips')
            ->whereNotBetween('departure_date', [$departureDate, $returnDate])
            ->whereNotBetween('return_date', [$departureDate, $returnDate])
            ->distinct()->lists('courier_id');

//        SELECT DISTINCT courier_id FROM trips
//    WHERE (departure_date NOT BETWEEN '2015-10-01' AND '2015-10-30')
//      AND (return_date NOT BETWEEN '2015-10-01' AND '2015-10-30');

    }


    public function getTest(Request $request)
    {
        $courierIds = \DB::table('couriers')->lists('id');

        $f = new TripFactory();

        $f->test();

        $f->createTrip(1, 1, Carbon::now());

    }
}
