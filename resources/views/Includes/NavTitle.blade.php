<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Zoogler</a></li>
                    <li class="breadcrumb-item active">{{ ucwords(str_replace('-', ' ', Request::segment(1))) }}</li>
                </ol>
            </div>
            <h4 class="page-title">{{ ucwords(str_replace('-', ' ', Request::segment(1))) }}</h4>
        </div>
    </div>
</div>
