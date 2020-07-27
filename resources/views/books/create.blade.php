@extends('layouts.app')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
     </div>
    @endif

    <form  class="add-form" action="/books" method="POST" enctype="multipart/form-data">
        @csrf
        @include('books.inc.form')
  </form>
@endsection





