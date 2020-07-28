@extends('layouts.app')

@section('content')


<div class="container">
    <h1>{{ $event->title }}</h1>
    

    <div class="eventDetails">
        <p>{{ $event->date }}</p>

        <p>by {{ $user_name[0]->name }}</p>
        

        <p>price: ${{ $event-> value }}</p>
        <a href="{{ action('BookingController@createNew', ['id' => $event->id]) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Buy Ticket</a>
        <a href="#" class="btn btn-light active" role="button" aria-pressed="true">Save</a>
    
    </div>
    
</div>

@endsection