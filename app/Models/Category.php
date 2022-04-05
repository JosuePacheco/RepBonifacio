<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const WEIGHT = 0;
    const PIECE = 1;

    protected $guarded = ["id"];

    protected $casts = [
        'updated_at'  => 'date:d-m-Y',
        'created_at' => 'date:d-m-Y',
    ];

    public function categoryable()
    {
        return $this->morphTo();
    }
}
