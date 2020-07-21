@extends ('layouts.app')

@section('content')
<div class="col">
<form action="{{ route('events.store') }}" method="POST">
    
    @include('events.fields')

    <div class="form-group row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Publish Event</button>
        </div>
        <div class="col-sm-9">
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
</div>
@endsection