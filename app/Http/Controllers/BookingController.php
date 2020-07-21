<?php

namespace App\Http\Controllers;

use App\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = DB::table('bookings') ->get();
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
        
        $id = DB::table('bookings') -> insertGetId([
            'event_id' => $request->input('event_id'),
            'user_id' => $request->input('user_id'),
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
        DB::table('bookings')
        ->where ('id', $booking->id)
        ->update([
            'event_id' => $request->input('event_id'),
            'user_id' => $request->input('user_id'),
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
