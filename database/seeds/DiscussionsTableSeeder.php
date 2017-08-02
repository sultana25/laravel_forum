<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1='implementing OAUTH with laravel';
        $t2='pagination in vue js is not woring correctly';
        $t3='vue js event listeners for child componenet';
        $d1=[
            'title'=>$t1,
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of',
            'channel_id'=>3,
            'user_id'=>1,
            'slug'=>str_slug($t1),
        ];
          $d2=[
            'title'=>$t2,
            'content'=>'the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'channel_id'=>5,
            'user_id'=>2,
            'slug'=>str_slug($t2),
        ];
          $d3=[
            'title'=>$t3,
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of',
            'channel_id'=>6,
            'user_id'=>1,
            'slug'=>str_slug($t3),
        ];
        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
    }
}
