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
                <a class="btn btn-primary mb-4" href="{{ route('list-meja.create') }}">Tambah Meja</a>
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="table_meja">
                        <thead>
                        <tr>
                            <th>No</th> <!-- Change here to 'No' -->
                            <th>Nomor Meja</th>
                            <th>Kapasitas</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($mejas as $index => $meja) 
                            <tr>
                                <td>{{ $index + 1 }}</td> 
                                <td>{{ $meja->Nomor_Meja }}</td>
                                <td>{{ $meja->Kapasitas }}</td>
                                <td>
                                    @php
                                        $badgeColor = '';
                                        switch ($meja->Status) {
                                            case 'tersedia':
                                                $badgeColor = 'success';
                                                break;
                                            case 'dipesan':
                                                $badgeColor = 'warning';
                                                break;
                                            case 'ditempati':
                                                $badgeColor = 'danger';
                                                break;
                                            default:
                                                $badgeColor = 'secondary';
                                        }
                                    @endphp
                                    <span class="badge badge-{{ $badgeColor }}">{{ $meja->Status }}</span>
                                </td>                                
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='{{ route('list-meja.edit', $meja->ID_Meja) }}'">
                                        <i class="fas fa-edit"></i>
                                    </button>                                    
                                    <a href="{{ route('list-meja.destroy', $meja->ID_Meja) }}" class="btn btn-sm btn-danger" onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus meja ini?')) { document.getElementById('delete-form-{{ $meja->ID_Meja }}').submit(); }">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    
                                    <form id="delete-form-{{ $meja->ID_Meja }}" action="{{ route('list-meja.destroy', $meja->ID_Meja) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
                
            </div>
        </div>
    </div> <!-- end col -->


</div> <!-- end row -->


@endsection


