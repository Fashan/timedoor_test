@extends('layouts.app');

@section('content');
<h1>Rating</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
    <div class="col-3">
    <form  method="post" action="/add-rating" enctype="multipart/form-data">
      {{csrf_field()}}
    <div class="mb-3">
      <label for="bookauthor" class="form-label">Name Author</label>
      <select id="bookauthor" class="form-select" name="author">
      @foreach($authors as $author)
        <option value = "{{$author->id}}">{{$author->name}}<option>
      @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="bookname" class="form-label">Book Name</label>
      <select id="bookname" class="form-select" name="book">
      @foreach($books as $book)
        <option value = "{{$book->id}}">{{$book->name}}<option>
      @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="rating" class="form-label">Rating</label>
      <select id="rating" class="form-select" name="rating">
      @for ($i = 1; $i <= 10; $i++)
            <option value = "{{$i}}">{{ $i }}</option>
        @endfor
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
 
</form>
    </div>
</div>
@endsection