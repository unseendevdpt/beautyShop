<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'category_id', 'is_active'];

    public function category()
    {
        return $this->belongsTo(Catrgory::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
