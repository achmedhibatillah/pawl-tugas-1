<section class="bg-clr3" style="">
    <div class="row m-0 p-0 justify-content-center">
        <div class="col-10 col-md-6 col-lg-3 m-0 p-0 d-flex justify-content-center align-items-center" style="padding:100px 0;min-height:100vh;">
            <div class="card bg-transparent m-0 p-0 w-100 border-clr1 px-3 py-4">
                <form action="{{ url('authentication-admin') }}" method="post">
                    @csrf
                    <h2 class="text-clr1 mb-3 fw-light">Admin Reservin</h2>
                    <div class="mb-3">
                    <input type="text" name="key_admin" class="form-control border-clr1 bg-transparent @error('key_admin') is-invalid @enderror" placeholder="Sandi autentikasi" autocomplete="off" value="{{ old('key_admin') }}">
                        @error('key_admin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-clr1">Login <i class="fas fa-sign-in-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>