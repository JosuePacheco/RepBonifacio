<?php

namespace App\Models;

use App\Models\Line;
use App\Models\User;
use App\Models\Group;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $casts = [
        'updated_at'  => 'date:d-m-Y',
        'created_at' => 'date:d-m-Y',
    ];

    protected $hidden = ["password"];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function user()
    {
        return $this->morphOne(User::class, "userable");
    }

    public function lines()
    {
        return $this->morphMany(Line::class, "lineable");
    }

    public function categories()
    {
        return $this->morphMany(Category::class, "categoryable");
    }
}
