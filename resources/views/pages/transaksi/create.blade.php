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
                    <h1>Grand Total : </h1>
                    <h1 style="float: right;" id="grandtotal"></h1>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <select name="barang" id="barang" class="select2 form-control" data-placeholder="Nama barang">
                            <option />
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }}" harga="{{ $item->harga_satuan }}">
                                    {{ $item->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="jumlah">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="button" id="btn-tambah-barang" class="btn btn-primary">Tambah Barang</button>
                    </div>
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

                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        var grandtotal = 0
        $('#dataTable').DataTable();
        $('.select2').select2();
        $(document).ready(function() {
            $('#grandtotal').text(grandtotal);
            $('#total_harga').val(grandtotal);
        })

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        }
        $("#btn-tambah-barang").on('click', (function(e) {
            e.preventDefault();

            var id = $('#barang').val();
            var nama = $('#barang option:selected').text();
            var harga = $("#barang").select2().find(":selected").attr('harga')
            var qty = $('#jumlah').val()
            var subtotal = harga * qty;
            if (id != '') {
                $('#baranglist').append('<tr><td><input type="hidden" name="master_barang_id[]" value="' + id +
                    '">' + id + '</td><td>' + nama +
                    '</td><td><input type="hidden" name="jumlah[]" value="' +
                    qty + '">' + qty + '</td><td> Rp ' +
                    formatRupiah(String(harga), '') + '</td><td> Rp ' + formatRupiah(String(subtotal), '') + '</td></tr>')
                grandtotal += subtotal;
                $('#grandtotal').text("Rp "+formatRupiah(String(grandtotal),''));
                $('#total_harga').val(grandtotal);
            }


        }));
    </script>
@endpush
