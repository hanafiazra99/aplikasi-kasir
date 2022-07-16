<?php

namespace App\Http\Controllers;

use App\Models\Master\Barang;
use App\Models\Transaksi\Pembelian;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
        $transaksi = Pembelian::all();
        return view('pages.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $barang  = Barang::all();
        return view('pages.transaksi.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'master_barang_id' => 'required'
        ], [
            'master_barang_id.required' => 'Barang wajib diisi'
        ]);
        $jumlah = $request->jumlah;
        DB::beginTransaction();
        try {
            $pembelian = Pembelian::create([
                'total_harga' => $request->total_harga
            ]);
            foreach ($request->master_barang_id as $key => $item) {
                $pembelian->detail()->create([
                    'master_barang_id' => $item,
                    'jumlah' => $jumlah[$key]
                ]);
            }
            DB::commit();
            return redirect()->route('transaksi');
        } catch (Exception $e) {
            DB::rollBack();
            abort(404, $e);
        }
    }

    public function show(Pembelian $transaksi)
    {   
        return view('pages.transaksi.show',compact('transaksi'));
    }
}
