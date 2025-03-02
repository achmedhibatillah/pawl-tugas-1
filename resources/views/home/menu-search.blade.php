<div id="menuContainer">
    <div class="m-0 px-3 row">
        @foreach($products as $x)
        <div class="col-6 col-xl-4 m-0 p-0">
            <div class="card card-menu cursor-pointer mx-2 text-clr1 m-0 bg-clr3 border-none shadow-l my-2 overflow-hidden"
            onclick="window.location.href='<?= url('pilih-produk-' . $x->product_id) ?>'">
                <div class="d-flex justify-content-center w-100 overflow-hidden square">
                    <img src="{{ url($x->product_photo) }}">
                </div>
                <div class="bg-clr3 text-clr3 text-shadow-xl description-element">
                    <h3 class="text-center fw-800 m-0">{{ $x->product_name }}</h3>
                    <h3 class="text-center fw-light m-0">Rp. {{ number_format($x->product_price, 2, ',', '.') }}</h3>
                    <div class="d-flex justify-content-center mt-3">
                        <p href="{{ url('') }}" class="m-0">Pesan sekarang</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.description-element {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: linear-gradient(to top, var(--clr1),rgba(23, 114, 110, 0.9), rgba(23, 114, 110, 0.7), rgba(23, 114, 110, 0.5), rgba(23, 114, 110, 0.3), rgba(255, 255, 255, 0));
    padding: 50px 10px 10px 10px;
    transition: transform 0.3s ease-in-out;
    transform: translateY(20%);
}

.card-menu:hover .description-element {
    transform: translateY(0);
}
</style>