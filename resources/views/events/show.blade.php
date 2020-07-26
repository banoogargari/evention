@extends('layouts.app')

@section('content')


<div class="container">
    <h1>{{ $event->title }}</h1>
    <div>
        <img src="{{ $event->image }}" width=100% style="border-style:solid; border-color:rgb(180,180,180); padding:1px; border-width:1px;" alt="">
    </div>

    <div class="eventDetails">
        <p>{{ $event->date }}</p>
        <p style="font-weight: bold;">{{ $event->title}}</p>
        <p>by {{ $user_name[0]->name }}</p>
        
        <p>price: ${{ $event-> value }}</p>
        <a href="{{ action('BookingController@createNew', ['id' => $event->id]) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Buy Ticket</a>
        <a href="#" class="btn btn-light active" role="button" aria-pressed="true">Save</a>

        <p>Purchase quantity: {{ $event-> purchasenum }}</p>

        <p>Video price: ${{ $event-> video_price }}</p>
        
    </div>
    

    <div class="eventDescription">
        <h3>About this Event</h3>
        <p>{{ $event->description }}</p>
    </div>
    
</div>






@endsection