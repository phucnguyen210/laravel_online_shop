<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'title',
        'description',
        'img',
        'price',
        'quantity',
        'code',
        'status',
        'brand_id',
        'category_id',
        'subcategory_id',
    ];

    public function brands()
    {
        return $this->belongsTo(Brands::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function Order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }

   
}