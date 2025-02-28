<div class="row m-0 p-0">
    <div class="col-md-4 m-0 p-3">
        <div class="card m-0 p-3 border-clr1 bg-transparent text-clr1">
            <h4 class="m-0">Tambah Produk</h4>
            <hr>
            <form action="{{ url('simpan-produk') }}" method="post">
                <div class="mb-3">
                    <input type="text" placeholder="Nama Produk" class="form-control bg-transparent border-clr1">
                </div>
                <div class="mb-3 row m-0 p-0">
                    <div class="col-1 m-0 p-0 d-flex align-items-center "><p class="m-0 fw-bold">Rp.</p></div>
                    <div class="col-11 m-0 p-0">
                        <input type="number" placeholder="Harga" class="form-control bg-transparent border-clr1">
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="product_photo">Pilih foto produk:</label>
                    <input type="file" name="product_photo" class="form-control border-clr1 bg-clr3" id="product_photo">
                </div>
                <button type="submit" class="btn btn-outline-clr1">Simpan</button>
            </form>
        </div>
    </div>
</div>