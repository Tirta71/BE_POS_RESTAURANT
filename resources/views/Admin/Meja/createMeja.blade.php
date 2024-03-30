@extends('Layout.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-5">Tambah Meja Baru</h4>
                <form method="POST" action="{{ route('list-meja.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="Nomor_Meja" class="col-sm-2 col-form-label">Nomor Meja</label>
                        <div class="col-sm-10">
                        
                            <input type="text" class="form-control" id="Nomor_Meja" name="Nomor_Meja" placeholder="Nomor Meja">
                            @error('Nomor_Meja')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Kapasitas" class="col-sm-2 col-form-label">Kapasitas</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="Kapasitas" name="Kapasitas" placeholder="Kapasitas">
                            @error('Kapasitas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="Status" name="Status">
                                <option value="tersedia">Tersedia</option>
                                <option value="dipesan">Dipesan</option>
                                <option value="ditempati">Ditempati</option>
                            </select>
                            @error('Status')
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
