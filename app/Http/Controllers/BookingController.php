<?php

namespace App\Http\Controllers;

use App\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {   
        $userId = Auth::user()->id;
        $bookings = DB::table('bookings')->where('user_id', $userId)->get();
        return view ('bookings.index')
            ->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get()->pluck('name', 'id')->prepend('none');
        $events = DB::table('events')->get()->pluck('title', 'id');
        return view('bookings.create')
            ->with('users', $users)
            ->with('events', $events);
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
        $id = DB::table('bookings') -> insertGetId([
            'event_id' => $request->input('event_id'),
            'user_id' => $userId,
            'bookingDate' => $request->input('bookingDate'),

        ]);
        return redirect()->action('BookingController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        return view('bookings.show', ['booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        $users = DB::table('users')->get()->pluck('name', 'id')->prepend('none');
        $events = DB::table('events')->get()->pluck('title', 'id');
        return view('bookings.edit')
            ->with('users', $users)
            ->with('events', $events)
            ->with('booking', $booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        $userId = Auth::user()->id;
        DB::table('bookings')
        ->where ('id', $booking->id)
        ->update([
            'event_id' => $request->input('event_id'),
            'user_id' => $userId,
            'bookingDate' => $request->input('bookingDate'),
        ]);
        
        return redirect()->action('BookingController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {
        DB::table('bookings')->where('id', $booking->id)->delete();
        return redirect()->action('BookingController@index');
    }
}
