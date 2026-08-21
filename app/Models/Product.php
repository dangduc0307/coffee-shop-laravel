<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'thumbnail',
        'featured',
        'status',
        'file',
        'file_size',
        'demo_url',
        'documentation_url',
        'requirements',
    ];


    public array $translatable = [
        'name',
        'slug',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // public function translations()
    // {
    //     return $this->hasMany(ProductTranslation::class);
    // }

    // public function translation()
    // {
    //     return $this->hasOne(ProductTranslation::class)
    //         ->where('locale', app()->getLocale());
    // }
}
