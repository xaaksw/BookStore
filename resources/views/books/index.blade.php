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
              <th>cover</th>
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
          <td>{{$book->numOfProduct}}</td>
              @if($book->cover)
                  <td> <img class="img-thumbnail"  src="{{asset('storage/'.$book->cover)}}" width="250px" height="250px"> </td>
              @endif

              <td><a href="/books/{{$book->id}}/edit">Edit</a></td>
              <td><form action="/books/{{$book->id}}" method="POST">
                      @csrf @method('DELETE')
                      <button class="btn btn-danger" type="submit">DElete</button>
                  </form></td>
          </tr>
    @endforeach
    </tbody>
    </table>
@endsection
