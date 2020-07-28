<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    
    public function index()
    {   $todayDate = date("Y-m-d");
        //$events = DB::table('events')->orderBy('date', 'desc')->get();
        
        $events = DB::table('events')->where('date', '>',$todayDate)->orderBy('date', 'desc')->get();
        //dd($events);
        $popevents = DB::table('events')->where('date', '>',$todayDate)->orderBy('purchasenum', 'desc')->get();
        
        
        return view('welcome')
            ->with('events', $events)
            ->with ('popevents', $popevents);
    }
}
