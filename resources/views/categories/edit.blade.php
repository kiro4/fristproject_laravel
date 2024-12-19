@extends('layouts.nav')
@section("title") Edit @endsection
@section("content")
@include("layouts.msg")
<form action="{{route("updateCategory",$category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<input class="form-control" type="text" name="name" id="" value="{{$category->name}}" placeholder="Name OF Category"> <br>
<textarea class="form-control" name="description" id="" cols="20" rows="5" placeholder="Enter The description of Category">{{$category->description}}</textarea><br>
<input class="form-control my-3" type="file" name="image" id="">
<button class="form-control btn btn-primary" type="submit">Submit</button>

</form>

@endsection