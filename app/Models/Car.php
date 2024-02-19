<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Car extends Model
{
    use HasFactory;

        protected $fillable = ['title', 'content', 'luggage', 'doors', 'passengers', 'price', 'image', 'category_id', 'active'];


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
