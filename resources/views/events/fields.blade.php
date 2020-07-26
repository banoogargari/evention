{{-- 
<!-- <div class="form-group row">
    <label class="col-sm-2 col-form-label"for="user_id">User</label>
    <div class="col-sm-10">
        <select name="user_id" class="form-control" id="user_id" required>
            @foreach($users as $id => $display)
                <option value="{{ $id }}" {{ (isset($event->user_id) && $id === $event->user_id) ? 'selected': '' }}>{{ $display }}</option>
            @endforeach
        </select>
        <small class="form-text text-muted">The user create the event.</small>
    </div>
</div> -->
--}}

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="title">Event title</label>
    <div class="col-sm-10">
        <input name="title" type="text" class="form-control" value="{{ $event->title ?? '' }}" />
        <small class="form-text text-muted">The Event title.</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="description">Event Description</label>
    <div class="col-sm-10">
        <input name="description" type="text" class="form-control" value="{{ $event->description ?? '' }}"/>
        <small class="form-text text-muted">The Event Description.</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="image">Event Image</label>
    <div class="col-sm-10">
        <input name="image" type="text" class="form-control" value="{{ $event->image ?? '' }}"/>
        <small class="form-text text-muted">The Event Image.</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="date">Event date</label>
    <div class="col-sm-10">
        <input name="date" type="date" class="form-control" value="{{ $event->date ?? '' }}"/>
        <small class="form-text text-muted">The Event date.</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="value">Price</label>
    <div class="col-sm-10">
        <input name="value" type="number" min="0.00" max="10000.00" step="0.01" required = "required" class="form-control" value="{{ $event->value ?? '' }}"/>
        <small class="form-text text-muted">The Event price.</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="capacity">Capacity</label>
    <div class="col-sm-10">
        <input name="capacity" type="text" class="form-control" value="{{ $event->capacity ?? '' }}"/>
        <small class="form-text text-muted">The Event Capacity.</small>
    </div>
</div>

 <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="video_price">Video Price</label>
    <div class="col-sm-10">
        <input name="video_price" type="text" class="form-control" value="{{ $event->video_price ?? '' }}"/>
        <small class="form-text text-muted">The price of the video.</small>
    </div>
</div>



<!--
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="video_available_date">video availablity</label>
    <div class="col-sm-10">
        <input name="video_available_date" type="text" class="form-control" value="{{ $event->video_available_date ?? '' }}"/>
        <small class="form-text text-muted">Video Availability date.</small>
    </div>
</div> -->






@csrf