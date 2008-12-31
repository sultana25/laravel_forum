<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1=['title'=>'laravel']; 
       $channel2=['title'=>'PHP']; 
       $channel3=['title'=>'Vuejs']; 
       $channel4=['title'=>'Javascript']; 
       $channel5=['title'=>'jQuery']; 
       $channel6=['title'=>'C']; 
       $channel7=['title'=>'C++']; 
       $channel8=['title'=>'Java']; 
        
        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
      
    }
}
