<!-- Page Heading -->
@extends('layouts.app')

<!-- DataTales Example -->
@section('content')
    @error('master_barang_id')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <form id="FormTambahBarang" action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <input type="hidden" name="total_harga" id="total_harga">
                    <h1>Waktu Transaksi : </h1>
                    <h1 style="float: right;"> {{ $transaksi->created_at->diffForHumans() }}</h1>
                </div>
                <div class="d-flex justify-content-between">
                    <input type="hidden" name="total_harga" id="total_harga">
                    <h1>Grand Total : </h1>
                    <h1 style="float: right;"> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</h1>
                </div>
            </div>

        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Belanja</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Qty</th>
                            <th>Harga Satuan</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>

                    <tbody id="baranglist">
                        @foreach ($transaksi->detail()->with('barang')->get()
        as $item)
                            <tr>
                                <th>{{ $item->master_barang_id ?? 0 }}</th>
                                <th>{{ $item->barang->nama_barang ?? 0 }}</th>
                                <th>{{ number_format($item->jumlah, 0, ',', '.') ?? 0 }}</th>
                                <th>Rp {{ number_format($item->barang->harga_satuan, 0, ',', '.') ?? 0 }}</th>
                                <th>Rp {{ number_format($item->jumlah * $item->barang->harga_satuan, 0, ',', '.') ?? 0 }}
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection
