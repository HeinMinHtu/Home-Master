<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function serviceProvider()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }
}
