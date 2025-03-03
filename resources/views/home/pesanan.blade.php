<section class="bg-clr1">
    <div class="row m-0 p-0 justify-content-center px-3">
        <div class="col-md-8 col-lg-5 m-0 p-0">
            <div class="text-clr1" style="padding: 70px 0;min-height:100vh;">
                <div class="card bg-clr3 text-clr1 px-4 py-3 shadow-m">
                    <h2 class="m-0 fw-bold"><i class="fas fa-print me-3 text-clr5"></i> Daftar Pesanan</h2>
                    <p class="m-0">Pemesanan telah dilakukan, harap tunggu pesanan Anda sampai.</p>
                </div>
                @if(!empty($orders))
                @foreach($orders as $x)
                <div class="card bg-clr3 text-clr1 px-4 py-3 shadow-m mt-2">
                    <div class="row m-0 p-0">
                        <div class="col-6 m-0 p-0 d-flex align-items-center">
                            <div>
                                <p class="m-0">ID Pemesanan :</p>
                                <p class="m-0 fw-bold fsz-18">#{{ $x->order_id }}</p>
                            </div>
                        </div>
                        <div class="col-6 m-0 p-0 d-flex align-items-center">
                            <table>
                                <tr>
                                    <td>Tanggal Pemesanan</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($x->created_at)->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Pukul Pemesanan</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($x->created_at)->format('H:i') }} WIB</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-0 p-0">
                        <div class="col-md-8 m-0 p-0 pe-3">
                            @foreach($x->details as $detail)
                                <div class="card text-clr1 m-0 p-3 bg-transparent border-clr2 mb-2">
                                    <div class="row m-0 p-0">
                                        <div class="col-3 m-0 p-0 d-flex align-items-center overflow-hidden">
                                            <div class="d-flex justify-content-center w-100 overflow-hidden square me-3 rounded shadow-l">
                                                <img src="{{ asset($detail->product->product_photo) }}">
                                            </div>
                                        </div>
                                        <div class="col-6 m-0 p-0 d-flex align-items-center">
                                            <div class="">
                                                <p class="m-0 fw-bold">{{ $detail->product->product_name }}</p>
                                                <p class="m-0 text-secondary fsz-10">Rp. {{ number_format($detail->product->product_price, 2, ',', '.') }} / unit</p>
                                                <p class="m-0">Rp. {{ number_format($detail->product->product_price * $detail->od_qty, 2, ',', '.') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-3 m-0 p-0 d-flex justify-content-center align-items-center">
                                            <div class="d-flex justify-content-center">
                                                <div class="">
                                                    <p class="text-center">Jumlah :</p>
                                                    <p class="text-center fw-bold">{{ $detail->od_qty }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4 m-0 p-0">
                            <div class="card text-clr1 m-0 p-3 bg-transparent border-clr2 mb-2">
                                <p class="m-0">Total :</p>
                                <p class="m-0">Rp. {{ number_format($x->order_total, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@foreach($orders as $x)

@endforeach