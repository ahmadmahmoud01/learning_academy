<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::create([
            'name' => 'ahmad mahmoud',
            'spec' => 'web developer',
            'img' => '1.png'
        ]);

        Trainer::create([
            'name' => 'mohammad mahmoud',
            'spec' => 'web designer',
            'img' => '2.png'
        ]);

        Trainer::create([
            'name' => 'mahmoud mahmoud',
            'spec' => 'graphic designer',
            'img' => '3.png'
        ]);

        Trainer::create([
            'name' => 'hassan mahmoud',
            'spec' => 'Motion designer',
            'img' => '4.png'
        ]);

        Trainer::create([
            'name' => 'ibrahim mahmoud',
            'spec' => 'dat analysist',
            'img' => '5.png'
        ]);
    }
}
