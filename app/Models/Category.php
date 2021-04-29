<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','category_id','price'];

    public function categories() {
        return $this->hasMany(Category::class);
    }

    public function subCategories() {
        return $this->hasMany(Category::class)->with('categories');
    }   
}
