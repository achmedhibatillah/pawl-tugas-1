<section class="bg-clr1" style="padding:100px 0;">
    <div class="row m-0 p-0">
        <div class="col-lg-7 m-0 p-0 d-flex justify-content-center align-items-center">
            <div class="mx-5">
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <div class="position-relative mt-5 mb-5" style="width:320px;;">
                        <div class="bg-clr3 rounded ps-3 pe-2 position-relative shadow-l" style="width:300px;transform:rotate(-4deg);left:5px;">
                            <img src="{{ asset('images/logo.png') }}" class="w-100">
                        </div>
                        <div class="position-absolute text-clr3 text-shadow-l" style="transform:rotate(-4deg);left:10px;">
                            Exclusive Nights, Effortless Reservations
                        </div>
                    </div>
                </div>
                <div class="text-clr3 mt-4 mx-0 mx-md-5 mx-lg-0 px-0 px-md-5 px-lg-0 me-0 me-lg-5 pe-0 pe-lg-5">
                    <div class="m-0 text-center text-lg-start me me-lg-5 pe-0 pe-lg-5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni fuga nisi reprehenderit facere eos ad ea, ab laboriosam obcaecati officia adipisci dolor sequi esse quod in expedita ut vitae veritatis?
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 m-0 p-0 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/ilustrations/table-reserved.png') }}" alt="">
        </div>
    </div>
</section>

<section class="bg-clr3" style="padding: 100px 0;">
    <div class="row m-0 p-0 justify-content-center">
        <div class="col-7 col-md-10 col-lg-8">
            <div class="d-flex justify-content-center align-items-center">
                <h2 class="text-clr1 text-center fw-800 m-0">Menu Kami</h2>
            </div>
            <div class="d-flex justify-content-center align-items-center mb-5">
                <a href="{{ url('menu') }}" class="td-none text-clr1 fw- border-clr1 rounded fsz-12 px-3 he-19 ms-2">Lihat Selengkapnya</a>
            </div>
            <div class="row m-0 p-0 mt-5">
                <div class="col-md-4 m-0 p-0 d-flex justify-content-center">
                    <div class="card bg-clr1 text-clr3 m-0 mb-3 px-2 py-2" style="width:90%;min-height:200px">
                    <div class="d-flex justify-content-center w-100 overflow-hidden square rounded border-clr1 mb-2">
                            <img src="{{ $products[0]->product_photo }}">
                        </div>
                        <h4 class="text-center fw-800 m-0 mt-3">{{ $products[0]->product_name }}</h4>
                        <h5 class="text-center font-price fw-light m-0 mt-3 bg-clr3 text-clr1">Rp. {{ number_format($products[0]->product_price, 2, ',', '.') }}</h5>
                        <a href="" class="text-center text-clr3 m-0 mt-3">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<section class="bg-clr3" style="height: 100vh;"></section>