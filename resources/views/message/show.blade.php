@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-9" style="display:flex">

            <div class="container m-2 p-2">
                <div class="container m-2 p-2">
                  <hr>
                  <p>{{ $message->message }}</p>
                  <a href="{{ route('message.index') }}" class="btn btn-success">Home</a>
                  <a href="{{ route('message.edit', $message->id) }}" class="btn btn-primary">Edit</a>
                </div>
              </div>

        </div>
    </div>
</div>

@endsection


























{{-- @extends('layouts.app')

@section('content')

<h1 class="text-center">Show Single Product</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-8" style="display:flex">

            <div class="card m-2 p-2" style="width: 18rem;">
                <img src="/images/{{ $product->picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->title }}</h5>
                  <h5 class="card-title">Price: ${{ $product->price }}</h5>
                  <hr>
                  <p class="card-text">{{ $product->description}} </p>
                  <a href="{{ route('product.index') }}" class="btn btn-primary">go Back</a>
                  <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                </div>
              </div>

        </div>


        <div class="col-md-4">
            <h3>All Comments</h3>

            @foreach ($product->comments as $comment)
                <p>{{ $comment->comment }}</p>
                <p>{{ $comment->rating }}</p>
            @endforeach

           <h3>Add Comment...</h3>

           <div class="conatiner">

            <form action="" method="POST">
                @csrf

                <input type="hidden" id="id" name="id" value="{{ $product->id }}">

                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter Comment">
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" name="rating" id="rating" placeholder="Enter Rating">
                </div>

                  <button type="submit" id="addCommentBtn" onclick="addComment($product->id)" class="btn btn-success">comment</button>

            </form>

           </div>



        </div>
    </div>
</div>


<script>


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
})


function addComment($id) {
    var comment = $('#comment').val();
    var rating =  $('#rating').val();
    var id = $('#id').val();


    $.ajax({
        type: "POST",
        dataType: "json",
        data: {comment:comment, rating:rating, _token: '{{csrf_token()}}'},
        url: "/products/"+$id,
        success: function(data) {
            console.log('Added Comment');
        },
        error: function(error) {
            console.log(error.responseJSON.errors.comment);
            console.log(error.responseJSON.errors.rating);
        }
    })
}





</script>


@endsection --}}