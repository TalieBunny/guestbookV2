@extends('layouts.app')

@section('content')

<h1 class="text-center">Admin All Messages</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Message</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->user->name }}</td>
                                <td>{{ $message->text }}</td>
                                <td><a href="{{ route('message.reply')}}" class="btn btn-secondary">Reply</a></td>
                                <td>
                                    <form action="{{ route('admin.messages.delete', $message->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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