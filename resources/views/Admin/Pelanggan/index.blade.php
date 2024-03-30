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
                {{-- <a class="btn btn-primary mb-4" href="{{ route('list-meja.create') }}">Tambah Meja</a> --}}
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="table_pelanggan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>No Meja</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggans as $index => $pelanggan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pelanggan->Nama_Pelanggan }}</td>
                                    <td>{{ $pelanggan->meja ? $pelanggan->meja->Nomor_Meja : '-' }}</td> 
                                    <td>
                                        <a href="{{ route('pelanggan.edit', $pelanggan->ID_Pelanggan) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pelanggan.destroy', $pelanggan->ID_Pelanggan) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">
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



