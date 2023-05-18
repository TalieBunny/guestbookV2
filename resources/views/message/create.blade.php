@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2>Create Message</h2>
    <hr>

    <form action="{{ route('message.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

          <div class="mb-3">
            <label for="price" class="form-label">Name and Surname</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Message</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Save Message</button>

    </form>

</div>


@endsection


