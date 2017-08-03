<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChannelsRequest;
use App\Http\Requests\ChannelEditRequest;
use Session;
use App\Channel;
class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels=Channel::all();
        return view('channels.index',compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChannelsRequest $request)
    {
        $channel=new Channel;
        $channel->title=$request->title;
        $channel->slug=$request->title;
        $channel->save();
        Session::flash('Success','Channel have been created');
        return redirect()->route('channels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel=Channel::findOrFail($id);
        return view('channels.edit',compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChannelEditRequest $request, $id)
    {
        $input=$request->all();
        $channel=Channel::findOrFail($id)->update($input);
        Session::flash('Success','Channel have been edited successfully');
        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel=Channel::findOrFail($id)->delete();
        return redirect()->route('channels.index');
    }
}
