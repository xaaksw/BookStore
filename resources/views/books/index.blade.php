@extends('layouts.app')

@section('content')
    <h2>this is books.index</h2>

    <table class="table table-dark">
        <thead>
          <tr>
            <th>Book Name</th>
            <th>Book author</th>
            <th>Description</th>
            <th>price</th>
            <th>numberOfProduct</th>
            <th>Edit</th>
            <th>DElETE</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
          <tr>
          <td>{{$book->title}}</td>
          <td>{{$book->author}}</td>
          <td>{{$book->description}}</td>
          <td>{{$book->price}}</td>
          <td>{{$book->numberOfProduct}}</td>
          <td><a href="/books/{{$book->id}}/edit">Edit</a></td>
          </tr>     
    @endforeach
    </tbody>
    </table>   
@endsection