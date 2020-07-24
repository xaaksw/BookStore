@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html>
 <head>

    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

 </head>
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
 


