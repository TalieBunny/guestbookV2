@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2>Update Message</h2>
    <hr>

    <form action="{{ route('message.update', $message->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
          <div class="mb-3">
            <label for="description" class="form-label">Message</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter Message">{{ $message->text }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">Update Message</button>

    </form>

</div>


@endsection


