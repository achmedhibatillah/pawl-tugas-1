<section class="bg-clr3" style="">
    <div class="row m-0 p-0 justify-content-center">
        <div class="col-10 col-md-6 col-lg-3 m-0 p-0 d-flex justify-content-center align-items-center" style="padding:100px 0;min-height:100vh;">
            <div class="">
                @if (session('success-auth'))
                <div class="card bg-transparent m-0 p-0 w-100 border-clr1 px-3 py-4 mb-3 position-relative" id="notif-flash">
                    <p class="text-clr1 m-0 mx-3 text-center">Registrasi berhasil dilakukan, silakan login dengan akun yang baru Anda buat.</p>
                    <button class="btn btn-transparent btn-sm text-clr1 position-absolute translate-right-top m-0" style="top:12px;right:10px;" id="close-flash"><i class="fas fa-times"></i></button>
                </div>
                @endif
                <div class="card bg-transparent m-0 p-0 w-100 border-clr1 px-3 py-4">
                    <div class="d-flex justify-content-center">
                        <div class="w-50 overflow-hidden">
                            <img src="{{ url('images/logo.png') }}" class="w-100">
                        </div>
                    </div> 
                    <hr>
                    <form action="{{ url('authentication-user') }}" method="post">
                        @csrf
                        <h2 class="text-clr1 mb-3 fw-light">Login</h2>
                        @if(session('errors-auth'))
                        <div class="card bg-transparent border-danger text-danger text-center m-0 mb-3 p-2">{{ session('errors-auth') }}</div>
                        @endif
                        <div class="mb-3">
                            <input type="text" name="customer_email" class="form-control border-clr1 bg-transparent @error('customer_email') is-invalid @enderror" placeholder="Email" autocomplete="off" 
                            value="{{ old('customer_email') }}">
                            @error('customer_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" id="customer_pass" name="customer_pass" class="form-control border-clr1 bg-transparent @error('customer_pass') is-invalid @enderror" placeholder="Kata sandi" autocomplete="off" 
                            value="{{ old('customer_pass') }}">
                            @error('customer_pass')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mt-2 form-check">
                                <input type="checkbox" class="form-check-input border-clr1 rounded-circle cursor-pointer" id="lihatpass">
                                <label class="form-check-label text-clr1" for="lihatpass">Tampilkan sandi</label>
                            </div>
                        </div>
                        <p class="mb-3 text-clr1">Belum punya akun? <a href="{{ url('registrasi') }}" class="text-clr1">Daftar di sini.</a></p>
                        <button type="submit" class="btn btn-outline-clr1">Login <i class="fas fa-sign-in-alt"></i></button>
                    </form>
                </div>
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