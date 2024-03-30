@extends('Layout.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-5">Edit Pesanan</h4>
                <form method="POST" action="{{ route('pesanans.update', $pesanan->ID_Pesanan) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group row">
                        <label for="ID_Pelanggan" class="col-sm-2 col-form-label">Pelanggan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="ID_Pelanggan" name="ID_Pelanggan">
                                @foreach ($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->ID_Pelanggan }}" {{ $pesanan->ID_Pelanggan == $pelanggan->ID_Pelanggan ? 'selected' : '' }}>
                                        {{ $pelanggan->Nama_Pelanggan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ID_Pelanggan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control  id="status" name="status">
                                <option value="proses" {{ $pesanan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
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
