<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    //one bookdetail have one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //one bookdetail have one author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    //one bookdetail have one publisher
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    //one book have many borrowing
    public function borrowing()
    {
        return $this->hasMany(Borrowing::class);
    }

    // price book accessor
    public function getPrice()
    {
        return 'Rp. ' . number_format($this->price, 0, ',', '.');
    }

    // img book accessor
    public function getImgAttribute()
    {
        return asset('storage/' . $this->images);
    }
}
