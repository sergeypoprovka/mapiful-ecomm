<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function tax_group(){
        return $this->belongsTo(TaxGroup::class);
    }
}
