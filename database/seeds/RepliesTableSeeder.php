<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1=[
          'user_id'=>1,
            'discussion_id'=>1,
            'content'=>'the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ];
         $r2=[
          'user_id'=>2,
            'discussion_id'=>3,
            'content'=>'Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
        ];
         $r3=[
          'user_id'=>1,
            'discussion_id'=>3,
            'content'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem',
        ];
        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
    }
}
