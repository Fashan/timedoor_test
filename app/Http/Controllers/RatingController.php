<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;
class RatingController extends Controller
{
    public function index(){
        $books = book::get();
        $authors = author::get();
        return view('pages.rating.index',compact('books','authors'));
    }

    public function add_rating(Request $request){
        // dd($request->all());
        Rating::create([
            "book_id" => $request->book,
            "rate"    => $request->rating
        ]);
        session()->flash('success', 'Data saved');
        return redirect('/rating');
  }

}
