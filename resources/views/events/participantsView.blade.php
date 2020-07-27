@extends('layouts.app')

@section('content')


<div class="container">
    


    <div>
        <h1>Participants</h1>
        <table class="table">
	<thead>
		<tr>
            <th>name</th>
			<th>email</th>

            
			
		</tr>
	</thead>
	<tbody>
		@forelse($participants as $participant)
			<tr>
                <td>{{ $participant->name}}</td>
				<td>{{ $participant->email}}</td>
                
            </tr>
        @empty
			
			
		@endforelse
	</tbody>
</table>

    </div>
    
</div>






@endsection