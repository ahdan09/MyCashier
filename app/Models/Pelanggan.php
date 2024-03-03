<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transaksi()
    {
        return $this->hasMany(Transaksis::class);
    }
    public function detailTransakai()
    {
        return $this->hasMany(DetailTransakai::class);
    }

}
