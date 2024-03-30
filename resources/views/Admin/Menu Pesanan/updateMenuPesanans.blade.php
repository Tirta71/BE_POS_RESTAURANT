@extends('Layout.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Menu Pesanan</h4>
                <form method="POST" action="{{ route('menu_pesanans.update', $menu_pesanan->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="ID_Pesanan" class="col-sm-2 col-form-label">ID Pesanan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="ID_Pesanan" name="ID_Pesanan">
                                @foreach($pesanans as $pesanan)
                                    <option value="{{ $pesanan->ID_Pesanan }}" {{ $pesanan->ID_Pesanan == $menu_pesanan->ID_Pesanan ? 'selected' : '' }}>{{ $pesanan->ID_Pesanan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ID_Menu" class="col-sm-2 col-form-label">ID Menu</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="ID_Menu" name="ID_Menu">
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->ID_Menu }}" data-harga="{{ $menu->Harga }}" {{ $menu->ID_Menu == $menu_pesanan->ID_Menu ? 'selected' : '' }}>{{ $menu->Nama_Menu }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="Jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="Jumlah" name="Jumlah" value="{{ $menu_pesanan->Jumlah }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="Harga" name="Harga" value="{{ $menu_pesanan->Jumlah * $menu_pesanan->menu->Harga }}">
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
