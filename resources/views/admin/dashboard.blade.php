@extends('layouts.app')

@section('content')

<h1 class="text-center">Admin Dashboard</h1>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Message</th>
                    <th scope="col" class="text-center">Date</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td class="vertical-align">{{ $message->user->name }}</td>
                            <td class="vertical-align">{{ $message->message }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y')}}</td>
                            <td class="text-center"><a href="{{ route('message.show', $message->id)}}" class="btn btn-primary"><i class="fa fa-reply"></i></a></td>
                            <td class="text-center">
                                <form action="{{ route('admin.message.delete', $message->id)}}" method="POST">
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