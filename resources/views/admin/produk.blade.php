<div class="row m-0 p-0">
    <div class="col-md-4 m-0 p-3 pe-1">
        <div class="card m-0 p-3 border-clr1 bg-transparent text-clr1">
            <h4 class="m-0">Tambah Produk</h4>
            <hr>
            <form action="{{ url('tambah-produk') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="product_name">Nama produk:</label>
                    <input type="text" name="product_name" id="product_name" placeholder="Nama Produk" class="form-control bg-transparent border-clr1 @error('product_name') is-invalid @enderror"
                    value="{{ old('product_name') }}">
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
                            value="{{ old('product_price') }}">
                        </div>
                        <div class="m-0 p-0 ps-1 d-flex align-items-center"><p class="m-0">,00</p></div>
                    </div>
                    @error('product_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <div class="mb-3">
                    <label for="product_photo">Pilih foto produk:</label>
                    <input type="file" name="product_photo" class="form-control border-clr1 bg-clr3 @error('product_photo') is-invalid @enderror" id="product_photo">
                    
                    @error('product_photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($errors->any() && !$errors->has('product_photo'))
                        <div class="text-danger fsz-12">Harap upload kembali foto produk.</div>
                    @endif
                </div>
                <hr>
                <button type="submit" class="btn btn-outline-clr1">Simpan</button>
            </form>
        </div>
    </div>
    <div class="col-md-8 m-0 p-3 ps-1">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Foto Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($products as $x)
                <tr>
                    <td>{{ $i }}</td>
                    <td>
                        <div class="d-flex rounded shadow overflow-hidden justify-content-center" style="width:100px;height:100px;"><img src="{{$x->product_photo}}" alt=""></div>
                    </td>
                    <td>{{$x->product_name}}</td>
                    <td><p class="m-0 font-price bg-clr2 text-clr1 px-2">Rp. {{ number_format($x->product_price, 2, ',', '.') }}</p></td>
                    <td>
                        <button type="button" class="bg-transparent border-clr1 we-30 me-2" onclick="window.location.href='<?= url('atur-produk/' . $x->product_slug) ?>'"><i class="fas fa-eye text-clr1"></i></button>
                        <button type="button" class="bg-transparent border-danger we-30 me-2" data-bs-toggle="modal" data-bs-target="#modalDel{{ $x->product_id }}"><i class="fas fa-trash text-danger"></i></button>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@foreach($products as $x)
<div class="modal fade" id="modalDel{{ $x->product_id }}" tabindex="-1" aria-labelledby="modalLabelDel{{ $x->product_id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalLabelDel{{ $x->product_id }}">Hapus <i>{{ $x->product_name }}</i></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="m-0">Apakah Anda yakin ingin menghapus produk dengan nama <i>{{ $x->product_name }}</i>?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form action="{{ url('hapus-produk') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $x->product_id }}">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endforeach
