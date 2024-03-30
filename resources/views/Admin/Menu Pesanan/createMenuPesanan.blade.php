@extends('Layout.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-5">Tambah Menu Pesanan Baru</h4>
                <form method="POST" action="{{ route('menu_pesanans.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="ID_Pesanan" class="col-sm-2 col-form-label">ID Pesanan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="ID_Pesanan" name="ID_Pesanan">
                                @foreach ($pesanans as $pesanan)
                                    <option value="{{ $pesanan->ID_Pesanan }}">{{ $pesanan->ID_Pesanan }}</option>
                                @endforeach
                            </select>
                            @error('ID_Pesanan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="ID_Menu" class="col-sm-2 col-form-label">ID Menu</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="ID_Menu" name="ID_Menu">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->ID_Menu }}" data-harga="{{ $menu->Harga }}">{{ $menu->Nama_Menu }}</option>
                                @endforeach
                            </select>                            
                            @error('ID_Menu')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="Jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="Jumlah" name="Jumlah" value="{{ old('Jumlah') }}">
                            @error('Jumlah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>
            
                    <div class="form-group row">
                        <label for="Harga" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Harga" name="Harga" value=" {{ old('Harga') }}" readonly>
                            @error('Harga')
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

<script>
    document.getElementById('Jumlah').addEventListener('input', function() {
        var jumlah = document.getElementById('Jumlah').value;
        var hargaMenu = document.getElementById('ID_Menu').options[document.getElementById('ID_Menu').selectedIndex].getAttribute('data-harga');
        document.getElementById('Harga').value = jumlah * hargaMenu;
    });

    document.getElementById('ID_Menu').addEventListener('change', function() {
        var jumlah = document.getElementById('Jumlah').value;
        var hargaMenu = this.options[this.selectedIndex].getAttribute('data-harga');
        document.getElementById('Harga').value = jumlah * hargaMenu;
    });
</script>


@endsection
