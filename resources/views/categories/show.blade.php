@extends('layouts.nav')
@section("title") Show @endsection
@section("content")

<div class="container">
    <div class="card" style="width: 18rem;">

    @if ($category->image)
        <img class="card-img-top mt-0" src="{{ asset("storage/$category->image") }}" alt="Category Image" style="max-width: 300px; height: auto; margin-top: 10px;">
    @else
        <p>No image available</p>
    @endif
            <div class="card-body">
          <h1 class="card-title">{{ $category->name }}</h1>
          <h2 class="card-text">{{ $category->description }}</h2>
        </div>
      </div>


</div>

@endsection
