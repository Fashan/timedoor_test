@extends('layouts.app');

@section('content');
<h1>List of Books</h1>
<div class="row">
    <div class="col-3">
    <form method="post" action="#" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="show" class="form-label">List Shown</label>
      <select id="show" class="form-select" name="show" require>
      @for ($i = 1; $i < 100; $i++)
            <option value = "{{$i}}">{{ $i }}</option>
        @endfor
      </select>
    </div>

    
    <div class="mb-3">
      <label for="search" class="form-label">Search</label>
      <input type="text" id="search" class="form-control" placeholder="Search" name="search" require>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
 
</form>
    </div>
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Book Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Author Name</th>
      <th scope="col">Average Rating</th>
      <th scope="col">Voter</th>
    </tr>
  </thead>
  <tbody>
      @foreach($books as $book)
      <tr>
      <th scope="row"></th>
      <td>{{$book->book_name}}</td>
      <td>{{$book->author_name}}</td>
      <td>{{$book->category_name}}</td>
      <td>{{$book->avg_rating}}</td>
      <td>{{$book->vote}}</td>

      
    </tr>
      @endforeach
   
   
  </tbody>
</table>
@endsection