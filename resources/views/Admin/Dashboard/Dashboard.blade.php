@extends('Layout.app')

@section('content')
    <!-- end page title and breadcrumb -->
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-contain">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                        <i class="fas fa-tasks text-gradient-success"></i>
                                    </div>
                                    <div class="col-10 text-right">
                                        <h5 class="mt-0 mb-1">{{ $jumlahPesanan }}</h5>
                                        <p class="mb-0 font-12 text-muted">Pesanan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body justify-content-center">
                            <div class="icon-contain">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                        <i class="fas fa-chair text-gradient-danger"></i>
                                    </div>
                                    <div class="col-10 text-right">
                                        <h5 class="mt-0 mb-1">{{ $jumlahMejaTersedia }}</h5>
                                        <p class="mb-0 font-12 text-muted">Meja Tersedia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-contain">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                        <i class="fas fa-users text-gradient-warning"></i>
                                    </div>
                                    <div class="col-10 text-right">
                                        <h5 class="mt-0 mb-1">{{ $jumlahPelanggan }}</h5>
                                        <p class="mb-0 font-12 text-muted">Pelanggan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-contain">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                        <i class="fas fa-money-bill-wave text-gradient-primary"></i>
                                    </div>
                                    <div class="col-10 text-right">
                                        <h5 class="mt-0 mb-1">Rp.{{ number_format($totalProfit, 0, ',', '.') }}</h5>
                                        <p class="mb-0 font-12 text-muted">Profit</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                        <label class="btn btn-primary btn-sm active">
                            <input type="radio" name="options" id="option1" checked=""> This Week
                        </label>
                        <label class="btn btn-primary btn-sm">
                            <input type="radio" name="options" id="option2"> Last Month
                        </label>
                    </div>
                    <h5 class="header-title mb-4 mt-0">Weekly Record</h5>
                    <canvas id="lineChart" height="82"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
