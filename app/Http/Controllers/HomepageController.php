<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    
    public function index()
    {
        $events = DB::table('events')->orderBy('date', 'desc')->get();

        $popevents = DB::table('events')->orderBy('purchasenum', 'desc')->get();
        
        return view('welcome')
            ->with('events', $events)
            ->with ('popevents', $popevents);
    }
}
