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
                <a class="btn btn-primary mb-4" href="{{ route('kategori-menus.create') }}">Tambah Kategori Menu</a>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoriMenus as $index => $kategoriMenu)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $kategoriMenu->Nama_Kategori }}</td>
                                    <td>
                                        <a href="{{ route('kategori-menus.edit', $kategoriMenu->ID_Kategori) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('kategori-menus.destroy', $kategoriMenu->ID_Kategori) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
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
