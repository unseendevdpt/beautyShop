<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = ['product_id', 'sku', 'price', 'stock_qty', 'is_active'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(VariantAttributeValue::class, 'variant_attribut_values', 'variant_id', 'attribute_value_id');
    }
}
