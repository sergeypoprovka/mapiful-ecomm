<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasSlug, HasTranslations;

    public $translatable = ['name','slug','description','thumbnail','sku','options'];

    protected $guarded = [];

    protected $with = ['attributes'];

    public function attributes(){
        return $this->belongsToMany(ProductAttribute::class);
    }

    public function variations(){
        return $this->hasMany(Product::class,'parent_id','id');
    }

    public function scopeParent($query){
        return $query->where('parent_id', NULL);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
