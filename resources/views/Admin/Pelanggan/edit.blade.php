@extends('Layout.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Pelanggan</h4>
                <form method="POST" action="{{ route('pelanggan.update', $pelanggan->ID_Pelanggan) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="Nama_Pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Nama_Pelanggan" name="Nama_Pelanggan" value="{{ $pelanggan->Nama_Pelanggan }}">
                            @error('Nama_Pelanggan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ID_Meja" class="col-sm-2 col-form-label">Meja</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="ID_Meja" name="ID_Meja">
                                @foreach($mejas as $meja)
                                    <option value="{{ $meja->ID_Meja }}" {{ $meja->ID_Meja == $pelanggan->ID_Meja ? 'selected' : '' }}>{{ $meja->Nomor_Meja }}</option>
                                @endforeach
                            </select>
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
