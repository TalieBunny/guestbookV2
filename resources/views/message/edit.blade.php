@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">
    <div class="home-button">
        <a href="{{ route('home') }}" class="btn btn-secondary">
            <i class="fa fa-angle-left"></i>
                Back to Home
        </a>
    </div>
    <h2>Update Message</h2>
    <hr>
    <form action="{{ route('message.update', $message->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
          <div class="mb-3">
            <label for="description" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message" placeholder="Enter Message">{{ $message->message }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Message</button>
          @if (\Session::has('success'))
                <div class="alert success fade-message">
                    <p>{{ \Session::get('success') }}</p>
                </div>

                <script>
                $(function(){
                    setTimeout(function() {
                        $('.fade-message').fadeOut();
                    }, 1000);
                });
                </script>
            @endif 
    </form>
</div>


@endsection


