@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">
    <h2>Create New Message</h2>
    <hr>
    <form action="{{ route('message.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message" placeholder="Enter Your Message"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Save Message</button>
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

<h1 class="text-center">Messages</h1>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Message</th>
                    <th scope="col">Reply from Addie and Jack</th>
                    <th scope="col" class="text-center">Date</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td class="vertical-align">{{ $message->message }}</td>
                            <td class="vertical-align">{{ $message->reply }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y')}}</td>
                            <td class="text-center"><a href="{{ route('message.edit', $message->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                            <td class="text-center">
                                <form action="{{ route('message.delete', ['id' => $message->id, 'user_id' => Auth::user()->id ]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection