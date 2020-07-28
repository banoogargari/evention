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
                    </a>
                    <a
                    href="{{ action('EventController@viewParticipants', ['id' => $event->id]) }}"
                        alt="Participants"
                        title="View Participants">
                       ViewParticipants
                    </a><br>

                    {!!Form::open(['action' => ['EventController@destroy', $event->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['style' =>  'padding: 1px 63px; color: red; border: none'])}}
                      {!!Form::close()!!}
                   
                </td>
            </tr>
        @empty
			
			<hr>
		@endforelse
	</tbody>
</table>
@endsection