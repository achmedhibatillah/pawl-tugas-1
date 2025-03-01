<nav class="navbar navbar-expand-lg bg-clr3">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('') }}">
        <img src="{{ asset('images/logo.png') }}" class="he-25">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-0 ms-lg-5 mt-3 mt-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-clr1 fw-bold" href="{{ url('') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-clr1 fw-bold" href="{{ url('menu') }}">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-clr1 fw-bold" href="{{ url('pesan') }}">Pesan</a>
        </li>
        <li class="nav-item my-2 my-lg-0 px-0 px-lg-2 d-flex align-items-center">
          <a class="nav-link text-clr1 fw-bold bg-clr1 text-clr3 rounded py-0 px-1 px-md-3" href="#">Login <i class="fas fa-user"></i></a>
        </li>
      </ul>
      <form class="d-flex mt-4 mt-lg-0" role="search">
        <input class="form-control me-0 border-clr1 bg-clr3 text-clr1" style="border-radius:20px;" type="search" placeholder="Cari menu..." aria-label="Search">
        <button class="btn btn-transparent text-clr1" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </div>
</nav>