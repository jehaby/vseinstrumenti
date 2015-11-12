<?php


namespace App;

use Carbon\Carbon;


class TripFactory
{


    /**
     * @param int $courier_id
     * @param int $region_id
     * @param Carbon | string $departure_date
     * @return Trip
     */
    public function createTrip($courier_id, $region_id, $departure_date)
    {

        if (! $departure_date instanceof Carbon) {
            $departure_date = Carbon::createFromFormat('Y-m-d', $departure_date);
        }

        $regions = Region::all();

        $arrivalDate = clone $departure_date;
        $arrivalDate->addHours($regions->find($region_id)->time_to);

        $returnDate = clone $arrivalDate;
        $returnDate->addHours($regions->find($region_id)->time_back);

        return Trip::create([
            'courier_id'     => $courier_id,
            'region_id'      => $region_id,
            'departure_date' => $departure_date,
            'arrival_date'   => $arrivalDate,
            'return_date'    => $returnDate
        ]);

    }


}