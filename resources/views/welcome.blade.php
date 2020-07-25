@extends('layouts.app')

@section('content')
<div class="container">
  <div class="first-image">
    <img style="width:100%; height:300px" src="img/img11.jpg" alt="First">
  </div>
</div>


<div class="container">
  <h2>Recent Events</h2>
  <div class="row">
		@forelse($events as $event)
      
        <div class="col-sm-6 col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="events/{{$event->id}}"><img class="img-thumbnail img-fluid" src="{{$event->image}}" alt="">
                
            </a>
            <div class="caption">
              <p>{{ $event->date }}</p>
              <p style="height:60px; font-weight:bold">{{ $event->title }}</p>
              
              <p><a href="events/{{$event->id}}" class="btn btn-primary" role="button">View</a> <a href="#" class="btn btn-default" role="button">Save</a></p> 
              
            </div>
          </div>
        </div>
      
      
    @empty
    @endforelse
    </div>
  </div>

</div>        
            
@endsection