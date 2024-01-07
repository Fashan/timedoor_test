<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
class RatingController extends Controller
{
    public function index(){
        $books = book::get();
        $authors = author::get();
        return view('pages.rating.index',compact('books','authors'));
    }
}
