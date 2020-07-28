<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input as input;

class SearchController extends Controller
{
    public function index()
    {
        $query = request('query');
        $events = DB::table('events')->where('title', 'LIKE', '%'.$query.'%')->get();

        
        
        return view('searchResult')
            ->with('events', $events);
            
    }
}
