@extends('Layout.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-5">Edit Menu</h4>
                <form method="POST" action="{{ route('menus.update', $menu->ID_Menu) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="Nama_Menu" class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Nama_Menu" name="Nama_Menu" value="{{ $menu->Nama_Menu }}">
                            @error('Nama_Menu')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="Harga" name="Harga" value="{{ $menu->Harga }}">
                            @error('Harga')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="ID_Kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="ID_Kategori" name="ID_Kategori">
                                @foreach($kategoriMenus as $kategoriMenu)
                                    <option value="{{ $kategoriMenu->ID_Kategori }}" {{ $kategoriMenu->ID_Kategori == $menu->ID_Kategori ? 'selected' : '' }}>{{ $kategoriMenu->Nama_Kategori }}</option>
                                @endforeach
                            </select>
                            @error('ID_Kategori')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>

                    <div class="form-group row">
                        <label for="ImageMenu" class="col-sm-2 col-form-label">Gambar Menu</label>
                        <div class="col-sm-10">
                            @if($menu->ImageMenu)
                                <img src="{{ asset('images/'.$menu->ImageMenu) }}" alt="Gambar Menu" style="max-width: 200px;">
                            @else
                                <p>Tidak ada gambar yang tersedia</p>
                            @endif
                            <input type="file" class="form-control-file mt-2" id="ImageMenu" name="ImageMenu">
                            @error('ImageMenu')
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
