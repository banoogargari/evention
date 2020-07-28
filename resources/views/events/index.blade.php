@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('events.create') }}" role="button">Add New Event</a>
@endsection

@section('content')
<table class="table">
	<thead>
		<tr>
            <th>ID</th>
            <th>EventPlanner</th>
			<th>Event Title</th>
			<th>Description</th>
            <th>Image</th>
            <th>EventDate</th>
            <th>Value</th>
            <th>Capacity</th>
            <th>Created</th>
			<th class="Actions">Actions</th>
			
		</tr>
	</thead>
	<tbody>
		@forelse($events as $event)
			<tr>
                <td>{{ $event->id}}</td>
                <td>{{ $event->user_id}}</td>
				<td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
				<td><img src="/storage/img/{{ $event->image }}" width="60" alt=""></td>
                <td>{{ $event->date }}</td>
                <td>${{ $event->value }}</td>
                <td>{{ $event->capacity }}</td>
                <td>{{ date('F d, Y', strtotime($event->created_at)) }}</td>
				<td class="actions">
                    <a style = "padding : 1px 67px" class = "alert alert-primary"
                        href="{{action('EventController@show', ['event' => $event->id])}}"
                        alt="View"
                        title="View">
                      View
                    </a><br>
                    <a style = "padding : 1px 71px" class = "alert alert-success"
                        href="{{ action('EventController@edit', ['event' => $event->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
<<<<<<< HEAD
=======

>>>>>>> 0b6071f5bf546b2c2dee29795b1eb2e02679f90b
                    </a>
                    <a  style = "padding : 1px 25px" class = "alert alert-secondary"
                    href="{{ action('EventController@viewParticipants', ['id' => $event->id]) }}"
<<<<<<< HEAD
                        alt="Participants"
=======
                      alt="Participants"
>>>>>>> 0b6071f5bf546b2c2dee29795b1eb2e02679f90b
                        title="View Participants">
                       ViewParticipants
                    </a><br>
                      <form action="{{ action('EventController@destroy', ['event' => $event->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button style = "padding : 1px 62px"  type="submit" class="btn btn-danger" title="Delete" value="DELETE">Delete</button>
                    </form>
                   
                </td>
            </tr>
        @empty
			
			<hr>
		@endforelse
	</tbody>
</table>
@endsection