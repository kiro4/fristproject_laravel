@extends('layouts.nav')

@section("title") register @endsection
@include("layouts.msg")

@section("content")

<form action="{{route("register")}}" method="post">
    @csrf
<input class="form-control  " type="text" name="name" placeholder="Enter your Name ">
<input class="form-control  my-5" type="email" name="email" placeholder="Enter your email ">
<input class="form-control  my-5" type="password" name="password" placeholder="Enter your password ">
<input class="form-control  " type="passwor mt-3d" name="password_confirmation" placeholder="Confirmid your password ">
<button type="submit" class="btn btn-primary mt-3">Submit</button>

</form>

@endsection