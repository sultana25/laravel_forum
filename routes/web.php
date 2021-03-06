<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/discuss', function () {
    return view('discuss');
});

Auth::routes();

Route::get('/forum',[
    'uses'=>'ForumsController@index',
    'as'=>'forum'
]);



Route::get('{provider}/auth',[
   'uses'=>'SocialsController@auth',
    'as'=>'social.auth'
]);

Route::get('/{provider}/redirect',[
   'uses'=>'SocialsController@auth_callback',
    'as'=>'social.callback'
]);

    Route::get('/channel/{slug}',[
       'uses'=>'ForumsController@channel',
        'as'=>'channel'
    ]);


    

Route::group(['middleware'=>'auth'],function(){
    Route::resource('channels','ChannelsController');
    Route::get('discussion/create',[
        'uses'=>'DiscussionsController@create',
        'as'=>'discussions.create'
    ]);
    Route::post('discussion/store',[
       'uses'=>'DiscussionsController@store' ,
        'as'=>'discussions.store'
    ]);
     Route::get('discussion/{slug}',[
        'uses'=>'DiscussionsController@show',
        'as'=>'Discussion'
              ]);
   
    Route::post('/discussion/reply/{id}',[
       'uses'=>'DiscussionsController@reply',
        'as'=>'discussion.reply'
    ]);
    Route::get('/reply/like/{id}',[
        'uses'=>'ReplyController@like',
        'as'=>'reply.like'
    ]);
    
    Route::get('/reply/unlike/{id}',[
       'uses'=>'ReplyController@unlike',
        'as'=>'reply.unlike'
    ]);
    
    Route::get('/discussion/watch/{id}',[
       'uses'=>'WatchersController@watch',
        'as'=>'discussion.watch'
    ]);
    
    Route::get('/discussion/unwatch/{id}',[
       'uses'=>'WatchersController@unwatch',
        'as'=>'discussion.unwatch'
    ]);
    
    Route::get('/reply/best/answer/{id}',[
        'uses'=>'ReplyController@best_ans',
        'as'=>'reply.best.answer'
    ]);
    
    Route::get('/discussions/edit/{slug}',[
       'uses'=>'DiscussionsController@edit',
        'as'=>'discussion.edit'
    ]);
    
    Route::post('/discussions/update/{id}',[
       'uses'=>'DiscussionsController@update',
        'as'=>'discussions.update'
    ]);
    
   
    
    Route::get('/reply/edit/{id}',[
        'uses'=>'ReplyController@edit',
        'as'=>'reply.edit'
    ]);
    
    
    Route::post('/reply/update/{id}',[
       'uses'=>'ReplyController@update',
        'as'=>'reply.update'
    ]);
    
    
    
    
    
    

});
