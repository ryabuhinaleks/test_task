<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $set_color=['#80a35e','#d3d358','#3a87ad','#d04040'];
        $set_repeat=['no','daily','weekly','monthly','yearly'];
        $days=range(strtotime('2020-10-01'), strtotime('2020-10-31'), (24*60*60));

        for($i=1; $i<16; $i++)
            DB::table('events')->insert([
                'title' => "Событие ".$i,
                'start' => date('Y-m-d',$days[rand(0,29)]),
                'color' => $set_color[rand(0,3)],
                'repeat' => $set_repeat[rand(0,4)],
                'user_id' =>rand(1,5),
            ]);
    }
}
