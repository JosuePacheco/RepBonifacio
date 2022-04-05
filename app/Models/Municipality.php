<?php

namespace App\Models;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
