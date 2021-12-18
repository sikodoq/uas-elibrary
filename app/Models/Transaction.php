<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    //one borrowing have one member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    //one borrowing have one book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    //Transaction Status Return accessor
    public function getStatusAttribute($value)
    {
        if ($this->is_returned >= 1) {
            return '<span class="badge badge-success">Returned</span>';
        } else {
            return '<span class="badge badge-danger">Borrowed</span>';
        }
    }
}
