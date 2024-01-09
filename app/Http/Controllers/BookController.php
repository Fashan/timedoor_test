<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
   public function index(){

   $books = DB::table('books')
    ->select('books.name as book_name', 'authors.name as author_name', 'categories.name as category_name', DB::raw('AVG(rating.rate) as avg_rating'), DB::raw('COUNT(rating.rate) as vote'))
    ->join('rating', 'books.id', '=', 'rating.book_id')
    ->join('authors', 'books.author_id', '=', 'authors.id')
    ->join('categories', 'books.category_id', '=', 'categories.id')
    ->groupBy('books.id', 'book_name', 'author_name', 'category_name')
    ->orderByDesc('avg_rating')
    ->take(10)
    ->get();
   //  return $topBooks;
    return view('pages.welcome',compact('books'));
   }

   public function topAuthor(){
      $authors = Author::select('authors.name as author_name', DB::raw('COUNT(rating.rate) as total_ratings'))
      ->join('books', 'authors.id', '=', 'books.author_id')
      ->leftJoin('rating', 'books.id', '=', 'rating.book_id')
      ->groupBy('authors.id', 'author_name')
      ->orderByDesc('total_ratings')
      ->take(10)
      ->get();

      return view('pages.top_author',compact('authors'));
      }

      public function search(Request $request){
            $keyword = $request->input('search');
            $limit = $request->input('show');

            $keyword = $request->input('search');
            $limit = $request->input('show', 10);
        
            if ($keyword & $limit) {
                  $books = Book::select(
                        'books.name as book_name',
                        'categories.name as category_name',
                        'authors.name as author_name',
                        DB::raw('AVG(rating.rate) as avg_rating'),
                        DB::raw('COUNT(rating.rate) as vote')
                    )
                    ->join('categories', 'books.category_id', '=', 'categories.id')
                    ->join('authors', 'books.author_id', '=', 'authors.id')
                    ->leftJoin('rating', 'books.id', '=', 'rating.book_id')
                    ->where(function($query) use ($keyword) {
                        $query->where('books.name', 'like', '%'.$keyword.'%')
                              ->orWhere('authors.name', 'like', '%'.$keyword.'%');
                    })
                    ->groupBy('books.id', 'book_name', 'category_name', 'author_name')
                    ->orderBy('book_name')
                    ->take($limit) 
                    ->get();
    
                    return view('pages.welcome',compact('books'));
            }else if (!$keyword) {
                  $books = DB::table('books')
                  ->select('books.name as book_name', 'authors.name as author_name', 'categories.name as category_name', DB::raw('AVG(rating.rate) as avg_rating'), DB::raw('COUNT(rating.rate) as vote'))
                  ->join('rating', 'books.id', '=', 'rating.book_id')
                  ->join('authors', 'books.author_id', '=', 'authors.id')
                  ->join('categories', 'books.category_id', '=', 'categories.id')
                  ->groupBy('books.id', 'book_name', 'author_name', 'category_name')
                  ->orderByDesc('avg_rating')
                  ->take($limit)
                  ->get();

                  return view('pages.welcome',compact('books'));
            } 
      }

  
   

   
}
