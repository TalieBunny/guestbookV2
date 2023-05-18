@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2">All Messages</h1>
<hr>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-6" style="display:flex">
            @foreach ($messages as $message)
            <div class="card m-2 p-2" style="width: 18rem;">
                <img src="images/{{ $product->picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <hr>
                  <p class="card-text">{{ $messate->text}} </p>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>


@endsection