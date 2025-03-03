<div class="row m-0 p-0">
    <div class="col-md-6 m-0 p-3" style="height:70vh;overflow:scroll;">
        @foreach($orders as $x)
        <div class="card bg-transparent border-clr1 text-clr1 px-4 py-3 mt-2">
            <div class="row m-0 p-0">
                <div class="row m-0 p-0">
                    <div class="col-9 m-0 p-0 d-flex align-items-center">
                        <table>
                            <tr>
                                <td>ID Pemesanan</td>
                                <td>:</td>
                                <td>{{ $x->order_id }}</td>
                            </tr>
                            <tr>
                                <td>Nama Pemesan</td>
                                <td>:</td>
                                <td>{{ $x->customer_name }}</td>
                            </tr>
                            <tr>
                                <td>Email Pemesan</td>
                                <td>:</td>
                                <td>{{ $x->customer_email }}</td>
                            </tr>
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
                    <div class="col-3 d-flex justify-content-center align-items-center">
                        <div class="">
                            <p class="text-center m-0">Total:</p>
                            <p class="text-center">Rp. {{ number_format($x->order_total, 2, ',', '.') }}</p>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-outline-clr1 btn-sm px-3"><i class="fas fa-eye"></i> lihat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>