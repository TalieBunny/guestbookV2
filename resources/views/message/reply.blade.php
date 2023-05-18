@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2>Reply</h2>
    <hr>

    <form action="{{ route('admin.messages.reply', $message->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
          <div class="mb-3">
            <label for="description" class="form-label">Enter your reply below</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter Reply">{{ $message->reply }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">Send Reply</button>

    </form>

</div>


@endsection


