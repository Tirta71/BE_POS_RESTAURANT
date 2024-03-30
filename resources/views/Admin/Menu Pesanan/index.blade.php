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
                <a class="btn btn-primary mb-4" href="{{ route('menu_pesanans.create') }}">Tambah Menu Pesanan </a>

           
            
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="menu_pesanans_table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pesanan</th>
                                <th>Nama Menu</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu_pesanans as $key => $menu_pesanan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $menu_pesanan->ID_Pesanan }}</td>
                                <td>{{ $menu_pesanan->menu->Nama_Menu }}</td> 
                                <td>{{ $menu_pesanan->Jumlah }}</td>
                                <td>{{ $menu_pesanan->Harga }}</td>
                                <td>
                                    <a href="{{ route('menu_pesanans.edit', $menu_pesanan->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('menu_pesanans.destroy', $menu_pesanan->id) }}" method="POST" style="display: inline;">
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

