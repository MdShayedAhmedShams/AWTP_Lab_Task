@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
            {{session()->forget('message')}}
    @endif
    <table class="table table-border">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="1">Edit Customer</th>
            <th colspan="2">Delete Customer</th>
        </tr>
        @foreach ($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->customername}}</td>
                <td>{{$customer->email}}</td>
                <td><a class="btn btn-warning" href="/customer/customerEdit/{{$customer->id}}">Edit Profile</a></td>
                <td><a class="btn btn-danger" href="customerDelete/{{$customer->id}}">Delete </a></td>
            </tr>
        @endforeach
    </table>
    @endsection
</body>
</html>
