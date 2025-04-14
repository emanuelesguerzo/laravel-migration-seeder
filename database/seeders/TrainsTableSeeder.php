<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Import Faker
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {


        for($i = 0; $i < 30; $i++) {

            $newTrain = new Train();

            $newTrain->company = $faker->company();
            $newTrain->departure_station = $faker->city();
            $newTrain->arrival_station = $faker->city();
            $departure = $faker->dateTimeBetween('now', '+2 days');
            $arrival = (clone $departure)->modify('+' . rand(1, 6) . ' hours');
            $newTrain->departure_time = $departure;
            $newTrain->arrival_time = $arrival;
            $newTrain->train_code = $faker->unique()->regexify('[A-Z]{2}[0-9]{4}'); // La Regex ci permette di avere 2 caratteri e 4 numeri
            $newTrain->carriages = $faker->numberBetween(3, 12);
            $newTrain->on_time = $faker->boolean(80); // 80% chance di essere in orario
            $newTrain->cancelled = $faker->boolean(10); // 10% chance di essere cancellato

            $newTrain->save();

        };
        
    }
}
