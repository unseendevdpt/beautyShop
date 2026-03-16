<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttributeValue extends Model
{
    protected $fillable = ['attribute_id','variant_id','value', 'sort_order'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
