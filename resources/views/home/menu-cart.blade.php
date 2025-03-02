@if($cart !== null)
<div class="card bg-clr3 text-clr1 px-4 py-3 shadow-m mb-2">
    <h5 class="m-0 text-center fw-800">Keranjang Saya</h5>
    <hr>
    @if($cart->isNotEmpty())
    @foreach($cart as $x)
    <div class="card text-clr1 m-0 p-3 bg-transparent border-clr2 mb-2">
        <div class="row m-0 p-0">
            <div class="col-3 m-0 p-0 d-flex align-items-center overflow-hidden">
                <div class="d-flex justify-content-center w-100 overflow-hidden square me-3 rounded shadow-l">
                    <img src="{{ asset($x->product_photo) }}">
                </div>
            </div>
            <div class="col-5 m-0 p-0 d-flex align-items-center">
                <div class="">
                    <p class="m-0 fw-bold">{{ $x->product_name }}</p>
                    <p class="m-0">Rp. {{ number_format($x->product_price, 2, ',', '.') }}</p>
                    <p class="m-0">x {{ $x->qty }} = Rp. {{ number_format($x->product_price * $x->qty, 2, ',', '.') }}</p>
                </div>
            </div>
            <div class="col-3 m-0 p-0 d-flex justify-content-center align-items-center">
                <div class="d-flex justify-content-center">
                    <div class="">
                        <p class="text-center mb-2 fw-bold">{{ $x->qty }}</p>
                        <i class="cursor-pointer rounded border-clr1 px-2 fsz-14" onclick="window.location.href='<?= url('kurang-produk-' . $x->product_id) ?>'">-</i>
                        <i class="cursor-pointer rounded border-clr1 px-2 fsz-14" onclick="window.location.href='<?= url('pilih-produk-' . $x->product_id) ?>'">+</i>
                    </div>
                </div>
            </div>
            <div class="col-1 m-0 p-0 d-flex justify-content-center align-items-center">
                <div class="text-clr5 cursor-pointer" onclick="window.location.href='<?= url('batal-pilih-produk-' . $x->product_id) ?>'">
                    <div class="d-flex justify-content-center">
                        <p class="m-0 text-center border-clr5 rounded-circle he-20 we-20 fsz-12">x</p>
                    </div>
                    <p class="fsz-10 m-0 lh-s ls-s text-center">batal</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <p class="m-0">Total : Rp. {{ number_format($total_price, 2, ',', '.') }}</p>
    <a href="" class="btn btn-clr1 mt-2">Pesan sekarang</a>
    @else
    <p class="text-center m-0">Keranjang Anda masih kosong.</p>
    @endif
</div>
@endif