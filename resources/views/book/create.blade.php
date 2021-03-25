@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Session::has('msg'))
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        @endif
        <h1>Add new Book</h1>
        <form action="{{route('store.book')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="book-title">Book Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('title')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="book-author">Book Author</label>
                <input name="author" type="text" class="form-control" id="exampleInputPassword1">
                @error('author')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="book-image">Book Image</label>
                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                @error('file')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
