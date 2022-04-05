<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
