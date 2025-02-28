<div class="bg-clr3 position-fixed w-100 d-flex d-md-none align-items-center" style="height:100vh;z-index:9999;">
    <h2 class="text-clr1 text-center m-0">Gunakan tablet, laptop, atau dekstop untuk mengakses halaman admin.</h2>
</div>

<div class="row m-0 p-0 bg-clr3 w-100" style="height:100vh;">
    <div class="col-md-3 col-lg-2 m-0 p-0 bg-clr1 overflow-scroll" style="height:100vh;">
        <div class="px-2">
            <div class="d-flex justify-content-center w-100 mt-2">
                <div class="d-flex bg-clr3 px-4 py-2 w-100">
                    <img src="{{ asset('images/logo.png') }}" class="w-100">
                </div>
            </div>
            <p class="text-clr3 m-0 mb-3 text-center">Admin Page</p>
            <div class="">
                <div class="row m-0 p-0">
                    <div class="col-6 m-0 p-0 pe-1">
                        <div class="card border-clr3 bg-transparent py-1">
                            <h2 class="m-0 text-clr3 text-center fw-light">24</h2>
                        </div>
                        <p class="text-center text-clr3 m-0 fsz-10">orderan</p>
                    </div>
                    <div class="col-6 m-0 p-0 ps-1">
                        <div class="card border-clr3 bg-transparent py-1">
                            <h2 class="m-0 text-clr3 text-center fw-light">8</h2>
                        </div>
                        <p class="text-center text-clr3 m-0 fsz-10">total produk</p>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ url('dashboard-admin') }}" class="btn btn-outline-clr3 py-1 w-100 fsz-12 mb-1">
                        <div class="row m-0 p-0">
                            <div class="col-1 m-0 p-0 d-flex justify-content-end align-items-center"><i class="fas fa-home"></i></div>
                            <div class="col-11 m-0 p-0 ps-2 d-flex justify-content-start align-items-center">Dashboard</div>
                        </div>
                    </a>
                    <a href="{{ url('atur-orderan') }}" class="btn btn-outline-clr3 py-1 w-100 fsz-12 mb-1">
                        <div class="row m-0 p-0">
                            <div class="col-1 m-0 p-0 d-flex justify-content-end align-items-center"><i class="fas fa-shopping-cart"></i></div>
                            <div class="col-11 m-0 p-0 ps-2 d-flex justify-content-start align-items-center">Orderan Berlangsung</div>
                        </div>
                    </a>
                    <a href="{{ url('atur-produk') }}" class="btn btn-outline-clr3 py-1 w-100 fsz-12 mb-1">
                        <div class="row m-0 p-0">
                            <div class="col-1 m-0 p-0 d-flex justify-content-end align-items-center"><i class="fas fa-list"></i></div>
                            <div class="col-11 m-0 p-0 ps-2 d-flex justify-content-start align-items-center">Manajemen Produk</div>
                        </div>
                    </a>
                    <a href="{{ url('atur-pelanggan') }}" class="btn btn-outline-clr3 py-1 w-100 fsz-12 mb-1">
                        <div class="row m-0 p-0">
                            <div class="col-1 m-0 p-0 d-flex justify-content-end align-items-center"><i class="fas fa-users"></i></div>
                            <div class="col-11 m-0 p-0 ps-2 d-flex justify-content-start align-items-center">Data Pelanggan</div>
                        </div>
                    </a>
                    <a href="{{ url('laporan-pemasukan') }}" class="btn btn-outline-clr3 py-1 w-100 fsz-12 mb-1">
                        <div class="row m-0 p-0">
                            <div class="col-1 m-0 p-0 d-flex justify-content-end align-items-center"><i class="fas fa-chart-line"></i></div>
                            <div class="col-11 m-0 p-0 ps-2 d-flex justify-content-start align-items-center">Laporan Pemasukan</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-lg-10 m-0 p-0 overflow-scroll">