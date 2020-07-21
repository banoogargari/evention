@extends('layouts.app')

@section('content')


<div class="container">
    <h1>{{ $event->title }}</h1>
    <div>
        <img src="{{ $event->image }}" width=100% alt="">
    </div>

    <div class="eventDetails">
        <p>{{ $event->date }}</p>
        <p style="font-weight: bold;">{{ $event->title}}</p>
        <p>by {{ $event->user_id }}</p>
        <p>price: {{ $event-> value }}</p>
        <a href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Ticket</a>
        <a href="#" class="btn btn-light active" role="button" aria-pressed="true">Save</a>
    </div>
    

    <div class="eventDescription">
        <h3>About this Event</h3>
        <p>{{ $event->description }}</p>
    </div>
    
</div>






@endsection