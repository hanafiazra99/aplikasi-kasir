@extends('layouts.app')

<!-- DataTales Example -->
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga Satuan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <td>{{ $item->nama_barang ?? '' }}</td>
                                <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#dataTable').DataTable();
    </script>
@endpush
