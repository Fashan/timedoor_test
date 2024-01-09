<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'rating';

    protected $fillable = ['book_id','rate'];
    protected $guarded = 'id';

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
