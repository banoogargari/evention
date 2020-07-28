@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">title</dt>
    <dd class="col-sm-9">{{ $booking->title }}</dd>

    <dt class="col-sm-3">Event ID</dt>
    <dd class="col-sm-9">{{ $booking->event_id }}</dd>

    <dt class="col-sm-3">Booking Date</dt>
    <dd class="col-sm-9">{{ date('F d, Y', strtotime($booking->bookingDate)) }}</dd>
	
    <dt class="col-sm-3">Created</dt>
    <dd class="col-sm-9">{{ date('F d, Y', strtotime($booking->created_at)) }}</dd>

    <dt class="col-sm-3">Updated</dt>
    <dd class="col-sm-9">{{ date('F d, Y', strtotime($booking->updated_at)) }}</dd>
</dl>
@endsection