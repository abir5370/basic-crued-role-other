<?php

namespace Database\Seeders;

use App\Models\Crued;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CruedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //for factory and faker use
        Crued::factory()->count(5)->create();

        //it's only for seeder use
        // for($data=0;$data<5;$data++){
        //     DB::table('crueds')->insert([
        //         'name' => Str::random(10),
        //         'email' => Str::random(10).'@gmail.com',
        //         'number' => rand(1000000000, 9999999999),
        //         'password' => Hash::make('password'),
        //         'photo' => 'null',
        //     ]);
        // }
       
    }

    
}
