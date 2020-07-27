<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
        
        $userId = Auth::user()->id;


        $events = DB::table('events')->where('user_id', $userId)->get();
        return view('events.index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$users = DB::table('users')->get()->pluck('name', 'id')->prepend('name');

        // $events = DB::table('events')->get()->pluck('title', 'id');
        return view('events.create');
            //->with('users', $users);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        //dd($userId);
        //'user_id' => $request->input('user_id'),
        
        $id = DB::table('events') -> insertGetId([
            'user_id' => $userId,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'date' => $request->input('date'),
            'value' => $request->input('value'),
            'capacity' => $request->input('capacity'),
            'video_price' => $request->input('video_price'),
            // 'video_available_date' => $request->input('video_available_date'),
            

            
        ]);
        return redirect()->action('EventController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //dd($event);
        $user_name = DB::table('events')
        ->join('users', 'events.user_id', '=', 'users.id')
        ->where('events.id', '=', $event->id)
        ->select('name')
        ->get()->all();
        //$users = DB::table('users')->join($event, 'users.id', '=', 'event.user_id')->get();
        //dd($user_name);
        return view('events.show', ['event' => $event , 'user_name' => $user_name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $users = DB::table('users')->get()->pluck('name', 'id')->prepend('name');
        // $events = DB::table('events')->get()->pluck('title', 'id');
        return view('events.edit')
            ->with('users', $users)
            ->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
            $userId = Auth::user()->id;
            DB::table('events')
            ->where('id', $event->id)
            ->update([
            'user_id' => $userId,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'date' => $request->input('date'),
            'value' => $request->input('value'),
            'capacity' => $request->input('capacity'),
            
        ]);
        return redirect()->action('EventController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
