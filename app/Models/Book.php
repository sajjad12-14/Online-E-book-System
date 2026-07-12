<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',
        'author_id',
        'title',
        'slug',
        'description',
        'image',
        'pdf',
        'price',
        'discount_price',
        'stock',
        'is_popular',
        'is_best_selling',
        'is_featured',
        'status'

    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
