<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\Client;
use App\Models\Expense;
use App\Models\Product;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $casts = [
        'updated_at'  => 'date:d-m-Y',
        'created_at' => 'date:d-m-Y',
    ];
    
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
