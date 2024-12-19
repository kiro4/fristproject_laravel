@extends('layouts.nav')
@section("title") Categories @endsection
@section("content")
@include("layouts.msg")

<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th><h2>#</h2></th>
            <th><h2>Name</h2></th>
            <th><h2>Description</h2></th>
            <th><h2>Image</h2></th>
            <th><h2>Action</h2></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td><h3>{{ $loop->iteration }}</h3></td>
                <td><h3>{{ $category->name }}</h3></td>
                <td><h3>{{ $category->description }}</h3></td>
                <td>
                    @if ($category->image)
                        <img src="{{ asset("storage/$category->image") }}" alt="Category Image" style="width: 100px; height: auto;">
                    @else
                        <p>No Image</p>
                    @endif
                </td>
                <td>
                    <a href="{{ route('showCategory', $category->id) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route("editCategory", $category->id) }}" class="btn btn-info">Edit</a>
                    <form class="d-inline-block" action="{{ route("deleteCategory", $category->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$categories->links()}}
@endsection
