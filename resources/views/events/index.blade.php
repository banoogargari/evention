@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('events.create') }}" role="button">Add New Event</a>
@endsection

@section('content')
<table class="table">
	<thead>
		<tr>
            
            
			<th>Event Title</th>
			<th>Description</th>
            <th>Image</th>
            <th>EventDate</th>
            <th>Value</th>
            <th>Capacity</th>
            
			<th class="Actions">Actions</th>
			
		</tr>
	</thead>
	<tbody>
		@forelse($events as $event)
			<tr>
                
				<td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
				<td><img src="/storage/img/{{ $event->image }}" width="60" alt=""></td>
                <td>{{ $event->date }}</td>
                <td>${{ $event->value }}</td>
                <td>{{ $event->capacity }}</td>
                
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
                    </a>
                    <a  style = "padding : 1px 25px" class = "alert alert-secondary"
                    href="{{ action('EventController@viewParticipants', ['id' => $event->id]) }}"
                        alt="Participants"
                        title="View Participants">
                       ViewParticipants
                    </a><br>

                    <!-- <a style = "padding : 1px 71px" class = "alert alert-success"
                        href="{{ action('EventController@destroy', ['event' => $event->id]) }}"
                        alt="Edit"
                        title="Edit"
                        method="POST">
                      Delete
                    </a> -->
                      <form action="{{ action('EventController@destroy', ['event' => $event->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button style = "padding : 1px 62px"  type="submit" class="btn btn-danger" title="Delete" value="DELETE">Delete</button>
                    </form>
                   
                </td>
            </tr>
        @empty
			
			
		@endforelse
	</tbody>
</table>
@endsection