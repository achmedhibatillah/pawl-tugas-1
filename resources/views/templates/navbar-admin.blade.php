<div class="row m-0 px-4 py-2 bg-clr2">
    <div class="col-12 m-0 p-0 d-flex justify-content-center align-items-center position-relative">
        <h2 class="text-clr1 text-center fw-800 m-0">{{ $title }}</h2>
        <div class="dropdown position-absolute" style="transform: translate(-50%,-50%);right:0;top:50%;">
            <a class="dropdown-toggle text-clr1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><i class="fas fa-user"></i></a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ url('dashboard-admin') }}">Dashboard</a></li>
                <li>
                    <form action="{{ @url('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row m-0 px-4 py-2 bg-clr1">
    <div class="d-inline-flex align-items-center">
        <span class="text-clr3 ms-2"><a href="{{ url('dashboard-admin') }}" class="text-clr3"><i class="fas fa-home text-clr3"></i></a></span>
        @if(isset($page))
        @foreach($page as $x)
            <span class="text-light ms-2"><i class="text-clr3 mx-3">&gt;</i> <a href="{{ $x['page_link'] }}" class="text-clr3 td-none">{{ $x['page_name'] }}</a></span>
        @endforeach
        @endif
    </div>
</div>


<style>
.dropdown-toggle::after {
    display: none !important;
}
</style>