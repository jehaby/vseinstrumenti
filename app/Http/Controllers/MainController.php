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


    public function postForm(Request $request, TripFactory $tripFactory)
    {

        $tripFactory->createTrip(
            $request->input('courierId'),
            $request->input('regionId'),
            $request->input('departureDate')
        );

        return redirect('/')->with('message', 'Поездка успешно добавлена');

    }


    public function getAvailableCouriersAndDates(Request $request)
    {

        $regions = Region::all();
        $regionId = $request->get('region_id');

        $departureDate = Carbon::createFromFormat('Y-m-d', $request->get('departure_date'));

        $arrivalDate = clone $departureDate;
        $arrivalDate = $arrivalDate->addHours($regions->find($regionId)->time_to);

        $returnDate = clone $arrivalDate;
        $returnDate = $returnDate->addHours($regions->find($regionId)->time_back)->toDateString();

        return json_encode([
            'arrival_date' => $arrivalDate->toDateString(),
            'return_date'  => $returnDate,
            'available_couriers' => $this->getAvailableCouriers($departureDate->toDateString(), $returnDate)
        ]);


    }


    private function getAvailableCouriers($departureDate, $returnDate)
    {
        return \DB::table('couriers')
            ->select('id')->whereNotIn('id', function ($query) use ($departureDate, $returnDate) {
                $query->select('courier_id')
                    ->from('trips')
                    ->whereBetween('departure_date', [$departureDate, $returnDate])
                    ->orWhereBetween('return_date', [$departureDate, $returnDate])
                    ->distinct();
            })->lists('id');

//        SELECT id FROM couriers
//        WHERE id NOT IN (SELECT DISTINCT courier_id FROM trips
//                         WHERE (departure_date BETWEEN '2015-11-01' AND '2015-11-03')
//                         OR (return_date BETWEEN '2015-11-01' AND '2015-11-03')
//                         );
    }


    public function getTest(Request $request)
    {


        dd($this->getAvailableCouriers('2015-11-01', '2015-11-02'));

        $courierIds = \DB::table('couriers')->lists('id');

        $f = new TripFactory();

        $f->test();

        $f->createTrip(1, 1, Carbon::now());

    }
}
