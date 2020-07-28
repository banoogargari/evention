<?php

namespace App\Http\Controllers;

use App\booking;
use App\Event; 
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
    {   $userId = Auth::user()->id;
        $bookings = DB::table('bookings')->join('events', 'events.id', '=', 'bookings.event_id')->where('bookings.user_id', $userId)->select('bookings.id','events.title', 'events.date')->get();
       
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


    public function order($eventId)
    {
        //dd($eventId);
        $event = DB::table('events')->where('id', $eventId)->get();
        $event = $event[0];

        $user_name = DB::table('events')
        ->join('users', 'events.user_id', '=', 'users.id')
        ->where('events.id', '=', $event->id)
        ->select('name')
        ->get()->all();

        //dd($event);
        return view('bookings.order', ['event' => $event, 'user_name' => $user_name]);
    }

    public function createNew($eventId)
    {
        //dd($eventId);
        $userId = Auth::user()->id;
        $bookingDate = "2020-07-21";
        $purchasenum = DB::table('events')->where('id', $eventId)->select('purchasenum')->get()->all();
        $pNum = $purchasenum[0];
        $pNum->purchasenum  = $pNum->purchasenum + 1;   
        //$purchasenum = $purchasenum + 1;
        //dd($pNum->purchasenum);
        $id = DB::table('bookings') -> insertGetId([
            'event_id' => $eventId,
            'user_id' => $userId,
            'bookingDate' => $bookingDate,
        ]);

        DB::table('events')
        ->where ('id', $eventId)
        ->update([
            'purchasenum' => $pNum->purchasenum,
        ]);


        return view('bookings.confirmation');
        //return redirect()->action('BookingController@index');

        
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
        //dd("hi");
        
        //dd($userBookings);
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
