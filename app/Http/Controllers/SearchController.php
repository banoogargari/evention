<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $query = 'laravel';
        $events = DB::table('events')->where('title', 'LIKE', '%'.$query.'%')->orderBy('date', 'desc')->get();

        
        
        return view('searchResult')
            ->with('events', $events);
            
    }
}
