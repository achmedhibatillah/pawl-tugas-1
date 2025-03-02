<section class="bg-clr3" style="">
    <div class="row m-0 p-0 justify-content-center">
        <div class="col-10 col-md-6 col-lg-3 m-0 p-0 d-flex justify-content-center align-items-center" style="padding:100px 0;min-height:100vh;">
            <div class="card bg-transparent m-0 p-0 w-100 border-clr1 px-3 py-4">
                <div class="d-flex justify-content-center">
                    <div class="w-50 overflow-hidden">
                        <img src="{{ url('images/logo.png') }}" class="w-100">
                    </div>
                </div>
                <hr>
                <form action="{{ url('verification-user') }}" method="post">
                    @csrf
                    <h2 class="text-clr1 mb-3 fw-light">Registrasi</h2>

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <input type="text" name="customer_name" class="form-control border-clr1 bg-transparent @error('customer_name') is-invalid @enderror" placeholder="Nama Lengkap" autocomplete="off" value="{{ old('customer_name') }}"
                        value="{{ old('customer_name') }}">
                        @error('customer_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <input type="text" name="customer_email" class="form-control border-clr1 bg-transparent @error('customer_email') is-invalid @enderror" placeholder="Email" autocomplete="off" value="{{ old('customer_email') }}"
                        value="{{ old('customer_email') }}">
                        @error('customer_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password dan Konfirmasi Password -->
                    <div class="mb-3">
                        <div class="row m-0 p-0">
                            <div class="col-6 m-0 p-0 pe-1">
                                <input type="password" id="customer_pass" name="customer_pass" class="form-control border-clr1 bg-transparent @error('customer_pass') is-invalid @enderror" placeholder="Sandi" autocomplete="off"
                                value="{{ old('customer_pass') }}">
                            </div>
                            <div class="col-6 m-0 p-0 ps-1">
                                <input type="password" id="customer_pass_confirmation" name="customer_pass_confirmation" class="form-control border-clr1 bg-transparent @error('customer_pass') is-invalid @enderror" placeholder="Konfirmasi Sandi" autocomplete="off"
                                value="{{ old('customer_pass_confirmation') }}">
                            </div>
                        </div>
                        @error('customer_pass')
                        <div class="text-danger fsz-12 mt-1">{{ $message }}</div>
                        @enderror
                        <div class="mt-2 form-check">
                            <input type="checkbox" class="form-check-input border-clr1 rounded-circle cursor-pointer" id="lihatpass">
                            <label class="form-check-label text-clr1" for="lihatpass">Tampilkan sandi</label>
                        </div>
                    </div>

                    <!-- Link ke halaman login -->
                    <p class="mb-3 text-clr1">Sudah punya akun? <a href="{{ url('login') }}" class="text-clr1">Login di sini.</a></p>

                    <!-- Tombol Registrasi -->
                    <button type="submit" class="btn btn-outline-clr1">Daftar <i class="fas fa-user-plus"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const lihatPass = document.getElementById("lihatpass");
    const passField = document.getElementById("customer_pass");
    const passField2 = document.getElementById("customer_pass_confirmation");

    lihatPass.addEventListener("change", function () {
        const type = this.checked ? "text" : "password";
        passField.type = type;
        passField2.type = type;
    });
});
</script>