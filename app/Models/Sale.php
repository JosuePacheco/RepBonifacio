<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branch;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $casts = [
        'updated_at'  => 'date:d-m-Y',
        'created_at' => 'date:d-m-Y',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, "seller_id");
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
