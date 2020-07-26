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
				<td><img src="{{ $event->image }}" width="60" alt=""></td>
                <td>{{ $event->date }}</td>
                <td>${{ $event->value }}</td>
                <td>{{ $event->capacity }}</td>
                <td>{{ date('F d, Y', strtotime($event->created_at)) }}</td>
				<td class="actions">
                    <a style = "padding : 1px 22px" class = "alert alert-primary"
                        href="{{action('EventController@show', ['event' => $event->id])}}"
                        alt="View"
                        title="View">
                      View
                    </a><br>
                    <a style = "padding : 1px 26px" class = "alert alert-success"
                        href="{{ action('EventController@edit', ['event' => $event->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                   
                      <!-- <form  action="{{route('events.destroy', ['event' => $event->id])}}" method="POST">
                                   @method('DELETE')    
                                      
                             <button style = "padding : 1px 17px; " type="submit" class="btn btn-danger">Delete</button>                               
                    </form>             -->

                    {!!Form::open(['action' => ['EventController@destroy', $event->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                      {!!Form::close()!!}
                    
                </td>
            </tr>
        @empty
			
			<hr>
		@endforelse
	</tbody>
</table>
@endsection