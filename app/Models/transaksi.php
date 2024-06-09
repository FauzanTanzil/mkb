<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pesanan(){
        return $this->hasMany(pesanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
