<?php

namespace App\Models;

use App\Models\Line;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = ["id"];

    protected $casts = [
        'updated_at'  => 'date:d-m-Y',
        'created_at' => 'date:d-m-Y',
    ];
    
    protected $hidden = ["password"];

    public function admin()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function lines()
    {
        return $this->morphMany(Line::class, 'lineable');
    }

    public function categories()
    {
        return $this->morphMany(Category::class, 'categoryable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
