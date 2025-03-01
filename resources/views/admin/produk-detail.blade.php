<div class="row m-0 p-3">
    <div class="col-md-4 m-0 p-0 pe-3">
        <div class="d-flex justify-content-center w-100 overflow-hidden square rounded border-clr1 mb-2">
            @if($products->product_photo)
            <img src="{{ url($products->product_photo) }}" alt="">
            @else
            <img src="{{ url('images/ilustrations/blank-food.png') }}" alt="">
            @endif
        </div>
    </div>
    <div class="col-md-8 m-0 p-0 ps-1">
        <div class="card m-0 p-3 border-clr1 text-clr1 bg-transparent">
            <h2 class="fw-light">{{ $products->product_name }}</h2>
            <hr>
            <h3 class="font-price fw-lighter">Rp. {{ number_format($products->product_price, 2, ',', '.') }}</h3>
            <table class="mt-4">
                <tr>
                    <td style="width:20%;">Ditambahkan pada</td>
                    <td style="width:2%">:</td>
                    <td style="width:78%;">{{ $products->created_at->format('d/m/Y \p\u\k\u\l H:i \W\I\B') }}</td>
                </tr>
                <tr>
                    <td style="width:20%;">Diperbarui pada</td>
                    <td style="width:2%">:</td>
                    <td style="width:78%;">{{ ($products->created_at == $products->updated_at)? 'Produk ini belum diperbarui.' : $products->updated_at->format('d/m/Y \p\u\k\u\l H:i \W\I\B')  }}</td>
                </tr>
            </table>
            <div class="row m-0 p-0 w-50 mt-4">
                <div class="col-6 m-0 p-0 pe-1">
                    <button class="btn btn-warning" style="width:100%;" id="editProdukBtn" type="button"><i class="fas fa-edit"></i> edit</button>
                </div>
                <div class="col-6 m-0 p-0 pe-1">
                    <button class="btn btn-danger" style="width:100%;" data-bs-toggle="modal" data-bs-target="#modalDel"><i class="fas fa-trash"></i> hapus</button>
                </div>
            </div>
        </div>
        <div class="card mt-3 m-0 border-clr1 bg-transparent text-clr1 p-3 {{ $errors->any() ? 'd-block' : 'd-none' }}" id="editProduk">
            <h3 class="fw-light">Edit Data</h3>
            <hr>
            <form action="{{ url('update-produk') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $products->product_id }}">
                <div class="mb-3">
                    <label for="product_name">Nama produk:</label>
                    <input type="text" name="product_name" id="product_name" placeholder="Nama Produk" class="form-control bg-transparent border-clr1 @error('product_name') is-invalid @enderror"
                    value="{{ old('product_name', $products->product_name) }}">
                    @error('product_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <div class="mb-3">
                    <label for="product_price">Harga produk:</label>
                    <div class="m-0 p-0 d-flex">
                        <div class="m-0 p-0 d-flex align-items-center "><p class="m-0">Rp.</p></div>
                        <div class="m-0 p-0 ps-1 w-100">
                            <input type="number" name="product_price" placeholder="000.000" class="form-control bg-transparent border-clr1 @error('product_price') is-invalid @enderror"
                            value="{{ old('product_price', $products->product_price) }}">
                        </div>
                        <div class="m-0 p-0 ps-1 d-flex align-items-center"><p class="m-0">,00</p></div>
                    </div>
                    @error('product_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <div class="mb-3">
                    <label for="product_photo">Ubah foto produk:</label>
                    <input type="file" name="product_photo" class="form-control border-clr1 bg-clr3" id="product_photo">
                </div>
                <hr>
                <button type="submit" class="btn btn-outline-clr1">Simpan</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDel" tabindex="-1" aria-labelledby="modalLabelDel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalLabelDel">Hapus <i>{{ $products->product_name }}</i></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="m-0">Apakah Anda yakin ingin menghapus produk dengan nama <i>{{ $products->product_name }}</i>?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form action="{{ url('hapus-produk') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $products->product_id }}">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
        </div>
    </div>
</div>

<script>
    const editProdukBtn = document.getElementById("editProdukBtn");
    const editProduk = document.getElementById("editProduk");

    editProdukBtn.addEventListener("click", function () {
        editProduk.classList.toggle("d-none");
    });
</script>