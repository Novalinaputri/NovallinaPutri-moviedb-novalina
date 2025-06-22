<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'synopsis',
        'category_id',
        'year',
        'actors',
        'cover_image',
    ];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
