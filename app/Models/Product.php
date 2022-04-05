<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Line;
use App\Models\User;
use App\Models\Branch;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $casts = [
        'updated_at'  => 'date:d-m-Y',
        'created_at' => 'date:d-m-Y',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function line()
    {
        return $this->belongsTo(Line::class);
    }
}
