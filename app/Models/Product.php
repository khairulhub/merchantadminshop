<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function storelist(){
        return $this->belongsTo(storelist::class, 'store_id', 'id');
    }


    public function categorylist(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function category()
{
    return $this->belongsTo(Category::class);
}
}
