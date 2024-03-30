@extends('Layout.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-5">Buat Pesanan Baru</h4>
                <form method="POST" action="{{ route('pesanans.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="ID_Pelanggan" class="col-sm-2 col-form-label">Pelanggan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="ID_Pelanggan" name="ID_Pelanggan">
                                @foreach ($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->ID_Pelanggan }}">{{ $pelanggan->Nama_Pelanggan }}</option>
                                @endforeach
                            </select>
                            @error('ID_Pelanggan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>
              
                    
                    <!-- Di sini Anda dapat menambahkan field lain yang diperlukan, seperti ID Menu, Jumlah, dll -->
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
