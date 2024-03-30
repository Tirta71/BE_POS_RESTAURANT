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
                <a class="btn btn-primary mb-4" href="{{ route('menus.create') }}">Tambah Menu</a>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Gambar Menu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $index => $menu)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $menu->Nama_Menu }}</td>
                                    <td>{{ number_format($menu->Harga, 0, ',', '.') }}</td>
                                    <td>{{ $menu->kategoriMenu->Nama_Kategori }}</td>
                                    <td>
                                        @if($menu->ImageMenu)
                                            <img src="{{ asset('images/' . $menu->ImageMenu) }}" alt="Menu Image" width="100" style="border-radius: 10px">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('menus.edit', $menu->ID_Menu) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('menus.destroy', $menu->ID_Menu) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
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
