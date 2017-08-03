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
       $channel1=['title'=>'laravel','slug'=>str_slug('laravel')]; 
       $channel2=['title'=>'PHP','slug'=>str_slug('PHP')]; 
       $channel3=['title'=>'Vuejs','slug'=>str_slug('Vuejs')]; 
       $channel4=['title'=>'Javascript','slug'=>str_slug('Javascript')]; 
       $channel5=['title'=>'jQuery','slug'=>str_slug('jQuery')]; 
       $channel6=['title'=>'C','slug'=>str_slug('C')]; 
       $channel7=['title'=>'C++','slug'=>str_slug('C++')]; 
       $channel8=['title'=>'Java','slug'=>str_slug('Java')]; 
        
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
