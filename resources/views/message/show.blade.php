@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">
    <div class="home-button">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            <i class="fa fa-angle-left"></i>
                Back to Home
        </a>
    </div>
    <h2>Reply</h2>
    <hr>
    <form action="{{ route('message.reply', $message->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
          <div class="mb-3">
            <label for="description" class="form-label">Message</label>
            <textarea class="form-control" name="reply" id="reply" placeholder="Enter Reply"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Send Reply</button>
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


