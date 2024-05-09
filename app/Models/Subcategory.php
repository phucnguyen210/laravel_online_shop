<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'sub_category';
    protected $fillable = [
        'name',
        'slug',
        'category_id',
    ];
    public function products()
    {
        return $this->hasMany(Products::class);
    }
    public function category()
{
    return $this->belongsTo(Category::class, 'category_id', 'id');
}
}