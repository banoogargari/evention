@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('bookings.create') }}" role="button">Add New Booking</a>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Event</th>
            <th>User</th>
            <th>BookingDate</th>
            <th>Created</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->event_id }}</td>
				<td>{{ $booking->user_id }}</td>
                <td>{{ $booking->bookingDate }}</td>
                <td>{{ date('F d, Y', strtotime($booking->created_at)) }}</td>
                <td class="actions">
                    <a
                        href="{{ action('BookingController@show', ['booking' => $booking->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ action('BookingController@edit', ['booking' => $booking->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ action('BookingController@destroy', ['booking' => $booking->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
@endsection