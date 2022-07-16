<?php

namespace App\Models\Transaksi;

use App\Models\Master\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBarang extends Model
{
    use HasFactory;
    protected $table = 'transaksi_pembelian_barang';
    protected $fillable = ['master_barang_id','jumlah'];

    public function barang(){
        return $this->belongsTo(Barang::class,'master_barang_id');
    }
}
