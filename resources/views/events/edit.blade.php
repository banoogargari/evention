@extends ('layouts.app')

@section('content')
<div class="col">
<form action="{{ route('events.update', ['event' => $event])}}" method="POST" enctype = "multipart/form-data">

    @method('PUT')
    @include('events.fields')

    <div class="form-group row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Update Event</button>
        </div>
        <div class="col-sm-9">
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
</div>
@endsection