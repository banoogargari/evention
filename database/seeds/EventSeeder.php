<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'user_id' => 1,
			'title' => 'Power Yoga',
			'description' => 'We are doing Yoga',
			'image' => 'This is the picture',
			'date' => '09/20/2020',
			'value' => 20,
			'capacity' => 10,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('events')->insert([
            'user_id' => 2,
			'title' => 'C++ workshop',
			'description' => 'You will learn C++ in 2 hours',
			'image' => 'Here is going to be an Image',
			'date' => '08/10/2020',
			'value' =>15,
			'capacity'=>10,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
    }
}
