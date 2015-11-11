<?php

use Illuminate\Database\Seeder;

use App\Trip;
use App\Courier;
use App\Region;
use Carbon\Carbon;
use App\TripFactory;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [["Санкт-Петербург", 15, 15],["Уфа", 40, 40],["Нижний Новгород", 10, 10],["Владимир", 5, 5]];

        foreach ($regions as $region) {
            $regionIds[] = Region::create([
                'title' => $region[0],
                'time_to' => $region[1],
                'time_back' => $region[2]
            ])->id;
        }

        $couriers = [
            ['Виссарион', "Иванович", "Махрыстин"],
            ["Ипполит", "Никифорович", "Евстигнеев"],
            ["Захар", "Петрович", "Перетятько"]
        ];

        foreach ($couriers as $courier) {
            $courierIds[] = Courier::create([
                'first_name' => $courier[0],
                'surname' => $courier[1],
                'last_name' => $courier[2],
            ])->id;
        }


    }
}
