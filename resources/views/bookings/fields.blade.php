<div class="form-group row">
        <label class="col-sm-2 col-form-label"for="event_id">Event</label>
        <div class="col-sm-10">
            <select name="event_id" class="form-control" id="event_id" required>
                @foreach($events as $id => $display)
                    <option value="{{ $id }}" {{ (isset($booking->event_id) && $id === $booking->event_id) ? 'selected': '' }}>{{ $display }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">The event number being booked.</small>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"for="user_id">User</label>
        <div class="col-sm-10">
            <select name="user_id" class="form-control" id="user_id" required>
                @foreach($users as $id => $display)
                    <option value="{{ $id }}" {{(isset($booking->user_id) && $id === $booking->user_id) ? 'selected': '' }}>{{ $display }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">The user booking the event.</small>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="bookingDate">Booking Date</label>
        <div class="col-sm-10">
            <input name="bookingDate" type="date" class="form-control" required placeholder="yyyy-mm-dd" value="{{ $booking->bookingDate ?? '' }}"/>
            <small class="form-text text-muted">The Booking Date.</small>
        </div>
    </div>

    

    

    @csrf