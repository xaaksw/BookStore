@extends('layouts.app')

@section('content')
<div class="container p-5 border rounded-lg bg-white">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
     </div>
    @endif

    <form action="/books" method="POST">
        @csrf
        <h2 class="p-2">Add Book to the system "ADMIN" </h2>
        <div class=" row form-group">
            <label class="col-4 " for="title">Book Title</label>
            <input class="col-8 form-control" class="form-control" id="title" name="title">
        </div>

        <div class=" row form-group">
            <label class="col-4 " for="author">Author </label>
            <input class="col-8 form-control" class="form-control" type="text" id="author" name="author">
        </div>

        <div class=" row form-group">
            <label class="col-4 " for="description">description </label>
            <input class="col-8 form-control" class="form-control" type="text" id="description" name="description">
        </div>

        <div class=" row form-group">
            <label class="col-4 " for="price">Price</label>
            <input class="col-8 form-control" type="number" class="form-control" id="price" name="price" >
        </div>

        <div class="row">
            <button class="btn  btn-dark btn-block" type="submit">Add Book</button>
        </div>
        

        
    </form>
</div>
@endsection