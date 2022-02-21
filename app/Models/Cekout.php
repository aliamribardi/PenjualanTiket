<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cekout extends Model
{
    use HasFactory;

    public function tiket() {
        return $this->belongsTo(Tiket::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }


}
