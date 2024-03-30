@extends('Layout.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-5">Tambah Kategori Menu Baru</h4>
                <form method="POST" action="{{ route('kategori-menus.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="Nama_Kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Nama_Kategori" name="Nama_Kategori" placeholder="Nama Kategori">
                            @error('Nama_Kategori')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
