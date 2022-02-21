<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function tiket() {
        return $this->hasMany(Tiket::class);
    }

    public function cekout() {
        return $this->hasMany(Cekout::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
