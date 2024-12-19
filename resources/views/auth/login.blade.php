@extends('layouts.nav')

@section("title") Login  @endsection
@include("layouts.msg")

@section("content")

<form action="{{route("login")}}" method="post">
    @csrf
<input class="form-control  my-5" type="email" name="email" placeholder="Enter your email ">
<input class="form-control  my-5" type="password" name="password" placeholder="Enter your password ">
<button type="submit" class="btn btn-primary mt-3">Submit</button>

</form>

@endsection