<!-- Page Heading -->
@extends('layouts.app')

<!-- DataTales Example -->
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
        </div>
        <div class="card-body">
            <a href="{{route('transaksi.create')}}" class="btn btn-primary btn-sm mb-3">Tambah Transaksi</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Harga Total</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $item->created_at->isoFormat('D MMMM Y (hh : mm : ss)') ?? '' }}</td>
                                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                <td><a href="{{route('transaksi.show',$item->id)}}"><i class="fa fa-search"></i></a></td>
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
