<?php

use Illuminate\Database\Seeder;
use App\TripFactory;
use Carbon\Carbon;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $courierIds = \DB::table('couriers')->lists('id');

        $regionIds = \DB::table('couriers')->lists('id');


        $dates = [Carbon::create(2015, 10, 1), Carbon::create(2015, 10, 3), Carbon::create(2015, 10, 7),
                  Carbon::create(2015, 11, 1), Carbon::create(2015, 11, 3), Carbon::create(2015, 11, 7),
                  Carbon::create(2015, 9, 1), Carbon::create(2015, 19, 3), Carbon::create(2015, 9, 7),
        ];

        $tripFactory = new TripFactory();

        foreach ($dates as $date) {
            $tripFactory->createTrip(
                $courierIds[array_rand($courierIds)],
                $regionIds[array_rand($regionIds)],
                $date
            );
        }

    }
}
