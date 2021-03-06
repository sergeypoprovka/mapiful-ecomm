<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['values'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function values(){
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function scopeVariations($query){
        return $query->where('used_for_variations','1');
    }

    public function scopeGeneral($query){
        return $query->where('used_for_variations','0');
    }
}
