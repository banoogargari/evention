@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    "Welcome back"

                    <h2>My Events</h2>
                    <p><a href="{{ route('events.index') }}">Click Here</a> to view and manage all your events</p>
                    
                    <h2>My Tickets</h2>
                    <p><a href="{{ route('bookings.index') }}">Click Here</a> to view and manage all your tickets</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
