<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    
    public function index()
    {
        $events = DB::table('events') ->get();
        return view('welcome')
            ->with('events', $events);
    }
}
