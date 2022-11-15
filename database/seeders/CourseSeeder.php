<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=3; $i++) {
            for($j=1; $j<=6; $j++) {
                Course::create([
                    'name' => "course num $i category num $j",
                    'small_desc' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
                    'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
                    'price' => rand(1000, 5000),
                    'img' => "$i$j.png",
                    'category_id' => $i,
                    'trainer_id' => rand(1, 5)
                ]);
            }
        }
    }
}
