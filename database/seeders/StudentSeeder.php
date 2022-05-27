<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=1; $i<5; $i++){

            $student = new Student;
            $student->name = $faker->name;
            $student->email = $faker->email;
            $student->password = $faker->password;
            $student->dob = $faker->date;
            $student->gender = "M";
            $student->fav_sport = "cricket";
            $student->country = $faker->country;
            $student->state = $faker->state;
            $student->address = $faker->address;
            $student->image = $faker->image;
            $student->hobby = "reading";
            $student->save();
        }
    }
}
