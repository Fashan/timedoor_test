@extends('layouts.app');

@section('content');
<h1>Famous Authors</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Author Name</th>
      <th scope="col">Voter</th>
    </tr>
  </thead>
  <tbody>
      @foreach($authors as $no => $author)
      <tr>
      <th scope="row">{{$no + 1}}</th>
      <td>{{$author->author_name}}</td>
      <td>{{$author->total_ratings}}</td>

      
    </tr>
      @endforeach
   
   
  </tbody>
</table>
@endsection