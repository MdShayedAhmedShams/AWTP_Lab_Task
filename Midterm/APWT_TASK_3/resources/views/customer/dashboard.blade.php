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
    <h2>Welcome customer: {{session()->get('customername')}}</h2>
    <br><br>
    <div class="field-md">
        <fieldset>
            <legend><div class="legend"><h2>Customer Profile</h2></div></legend>
            <form action="{{route('cDashboardSubmit')}}" class="form-group" method="post">
            {{ csrf_field() }}
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                        {{session()->forget('message')}}
                @endif
            <div class="col-md-4 form-group">
                <label for="customername">Customername</label>
                <input type="text" name="customername" class="form-control" id="customername" value="{{$customer->customername}}">
                @error('customername')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="col-md-4 form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{$customer->email}}">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

                <input type="submit" class="btn btn-success" value="Update" >
            </form>

        </fieldset>
    </div>
    @endsection
</body>
</html>
