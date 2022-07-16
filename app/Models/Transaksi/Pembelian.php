<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table =  'transaksi_pembelian';
    protected $fillable = ['total_harga'];

    public function detail(){
        return $this->hasMany(PembelianBarang::class,'transaksi_pembelian_id');
    }
}

