@extends('layouts.nav')
@section("title") Create @endsection
@section("content")
@include("layouts.msg")


<form action="{{route("categories")}}" method="POST" enctype="multipart/form-data">
    @csrf
<input class="form-control" type="text" name="name" id="" placeholder="Name OF Category"> <br>
<textarea class="form-control" name="description" id="" cols="20" rows="5" placeholder="Enter The description of Category"></textarea><br>
<input class="form-control-lg my-3" type="file" name="image" id="">
<button class="form-control btn btn-primary" type="submit">Submit</button>

</form>

@endsection