<nav class="navbar navbar-expand-lg w-100 bg-clr3 shadow-l">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('') }}">
        <img src="{{ asset('images/logo.png') }}" class="he-25">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-0 ms-lg-5 mt-3 mt-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mx-1 my-1 bg-clr1 d-flex align-items-center justify-content-center rounded">
          <a class="nav-link text-clr3 td-none fw-bold" href="{{ url('') }}" style="width:100px;">
            <hr>
            <div class="d-flex justify-content-center mt-2 pt-1 rounded he-35"><i class="fas fa-home fsz-22 mb-1"></i></div>
            <div class="m-0 fw-bold text-center">Dashboard</div>
          </a>
        </li>
        <li class="nav-item mx-1 my-1 bg-clr1 d-flex align-items-center justify-content-center rounded">
          <a class="nav-link text-clr3 td-none fw-bold m-0" href="{{ url('menu') }}" style="width:100px;">
            <hr>
            <div class="d-flex justify-content-center mt-2 pt-1 rounded he-35"><i class="fas fa-mug-hot fsz-22 mb-1"></i></div>
            <div class="m-0 fw-bold text-center">Menu</div>
          </a>
        </li>
        @if(session()->has('is_user'))
        <li class="nav-item mx-1 my-1 bg-clr5 d-flex align-items-center justify-content-center rounded">
          <a class="nav-link text-clr3 td-none fw-bold m-0" href="{{ url('pesanan') }}" style="width:100px;">
            <hr>
            <div class="d-flex justify-content-center mt-2 pt-1 rounded he-35"><i class="fas fa-print fsz-22 mb-1"></i></div>
            <div class="m-0 fw-bold text-center">Pesanan</div>
          </a>
        </li>
        <li class="nav-item mx-1 my-1 bg-clr5 d-flex align-items-center justify-content-center rounded">
          <a class="nav-link text-clr3 td-none fw-bold m-0" href="{{ url('riwayat') }}" style="width:100px;">
            <hr>
            <div class="d-flex justify-content-center mt-2 pt-1 rounded he-35"><i class="fas fa-list-alt fsz-22 mb-1"></i></div>
            <div class="m-0 fw-bold text-center">Riwayat</div>
          </a>
        </li>
        @endif
      </ul>
      @if($status !== 'menu')
      <form class="d-flex mt-4 mt-lg-0" role="search" action="{{ url('menu') }}">
        <input name="k" class="form-control me-0 border-clr1 bg-clr3 text-clr1" style="border-radius:20px;" type="search" placeholder="Cari menu..." aria-label="Search">
        <button class="btn btn-transparent text-clr1" type="submit"><i class="fas fa-search"></i></button>
      </form>
      @endif
      <div class="mt-2 rounded mx-1 my-lg-0 px-0 px-lg-2 d-flex align-items-center justify-content-center" style="z-index:999;">
          @if(session()->has('is_user'))
          <div class="dropdown text-clr1 mx-0 px-0">
            <a class="dropdown-toggle text-clr5 td-none w-100" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
              <div class="d-flex justify-content-center text-clr5 pt-1 mt-2 rounded"><i class="fas fa-user fsz-22 mb-1"></i></div>
              <div class="m-0 fw-bold text-center">Saya</div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end bg-clr3 shadow-l mt-4" style="width: min-content;">
              <li class="px-3">
                <h5 class="text-center m-0 mt-2 text-clr1 fw-bold">Sistem Autentikasi Reservin</h5>
              </li>
              <li class="m-0 p-0"> 
                <hr>
              </li>
              <li class="px-3">
                <table class="text-clr1">
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $ses->customer_name }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $ses->customer_email }}</td>
                  </tr>
                </table>
                <a href="{{ url('profil') }}" class="btn btn-outline-clr1 p-1 px-3 w-100 mt-2">Lihat profil</a>
              </li>
              <li class="pb-2">
                  <hr>
                  <form action="{{ @url('logout') }}" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item text-danger">Logout <i class="fas fa-sign-out-alt"></i></button>
                  </form>
              </li>
            </ul>
          </div>
          @else
          <a class="nav-link text-clr1 fw-bold bg-clr1 text-clr3 rounded m-0 py-0 px-1 px-md-3" href="{{ url('login') }}">Login <i class="fas fa-user"></i></a>
          @endif
      </div>
    </div>
  </div>
</nav>

<style>
.dropdown-toggle::after {
    display: none !important;
}
</style>

<style>
  @media (max-width: 768px) {
    .dropdown-menu {
      left: 50% !important;
      transform: translateX(-50%) !important;
    }
  }
</style>