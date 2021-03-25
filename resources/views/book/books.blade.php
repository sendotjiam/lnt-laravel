@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('msg'))
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        @endif
        <h1>Books List</h1>
        <a href="{{route('add.book')}}">Add new book</a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">File</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td><img src="{{ asset('storage/'.$book->file) }}" alt="{{$book->file}}" width="200" height="100"></td>
                        <td>
                            <form action="{{ route('delete.book', $book->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
