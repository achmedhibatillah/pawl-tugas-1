<section class="bg-clr3">
    <div class="row m-0 p-0 justify-content-center">
        <div class="col-md-11 col-lg-6 m-0 p-0 bg-clr1 shadow-l">
            <div class="text-clr3" style="padding: 70px 0;">
                <h2 class="text-center">Daftar Menu</h2>
                <div class="justify-content-center mt-4">
                    <div class="m-0 px-3 row">
                        @foreach($products as $x)
                        <div class="col-md-6 m-0 p-0">
                            <div class="card mx-2 text-clr1 m-0 bg-clr3 border-none shadow-m my-2 overflow-hidden">
                                <div class="d-flex justify-content-center w-100 overflow-hidden square">
                                    <img src="{{ url($x->product_photo) }}">
                                </div>
                                <div class="bg-clr1 text-clr3">
                                    <h3 class="text-center fw-light m-0">{{ $x->product_name }}</h3>
                                    <h3 class="text-center fw-light m-0">Rp. {{ number_format($x->product_price, 2, ',', '.') }}</h3>
                                    <div class="d-flex justify-content-center my-3">
                                        <a href="{{ url('') }}" class="btn btn-outline-clr3">Pesan sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>