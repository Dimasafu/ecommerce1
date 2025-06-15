<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'name',
        'description',
        'stock',
        'price',
        'image',
        'category_id'
    ];
}
