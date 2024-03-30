@extends('Layout.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <a class="btn btn-primary mb-4" href="{{ route('pesanans.create') }}">Tambah Pesanan baru</a>
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="pesanan-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal Pesanan</th>
                                <th>Total Harga</th>
                                <th>Status</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanans as $index => $pesanan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pesanan->pelanggan->Nama_Pelanggan }}</td>
                                    <td>{{ $pesanan->created_at }}</td>
                                    <td>Rp {{ number_format($menuPesananModel->getTotalHargaPerPesanan($pesanan->ID_Pesanan), 2) }}</td>
                                    <td>
                                        @if($pesanan->status == 'proses')
                                            <span class="badge badge-primary">Proses</span>
                                        @elseif($pesanan->status == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @else
                                            <span class="badge badge-secondary">Status Tidak Valid</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('pesanans.edit', $pesanan->ID_Pesanan) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pesanans.destroy', $pesanan->ID_Pesanan) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




