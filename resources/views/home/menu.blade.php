<section class="bg-clr1">
    <div class="row m-0 p-0 justify-content-center px-3">
        <div class="col-md-8 col-lg-5 m-0 p-0">
            <div class="text-clr1" style="padding: 70px 0;min-height:100vh;">
                <div class="card bg-clr3 text-clr1 px-4 py-3 shadow-m">
                    <h2 class="m-0 fw-bold"><i class="fas fa-mug-hot me-3 text-clr5"></i> Daftar Menu</h2>
                </div>
                <div class="card bg-clr3 text-clr1 px-4 py-3 shadow-m mt-2">
                    <form class="" id="searchForm" action="{{ url('menu') }}" method="GET">
                        <label for="searchInput" class="fw-bold">Mau nyari apa bes?</label>
                        <input name="k" id="searchInput" value="{{ $k }}" class="form-control px-4 me-0 border-clr1 bg-clr3 text-clr1 fw-bold" 
                            style="border-radius:20px;" type="search" placeholder="Cari menu..." aria-label="Search">
                    </form>
                </div>
                <div class="justify-content-center mt-2">
                    <div class="card m-0 bg-clr3 shadow-m py-3">             
                    @include('home.menu-search')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 m-0 p-0 ps-3">
            <div class="text-clr1" style="padding: 70px 0;min-height:100vh;">
                <div class="card bg-clr5 text-clr2 px-4 py-3 shadow-m mb-2">
                    <p class="m-0 text-center ">Saat ini Anda belum login. <a href="{{ url('login') }}" class="text-clr3">Login di sini</a> <i class="fas fa-user text-clr3"></i> untuk memesan menu.</p>
                </div>
                <div class="card bg-clr3 text-clr1 px-4 py-3 shadow-m mb-2">
                    <p class="m-0">Silakan klik menu di samping untuk melakukan pemesanan.</p>
                </div>
                @include('home.menu-cart')
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const menuContainer = document.getElementById("menuContainer");

    searchInput.addEventListener("keyup", function () {
        let keyword = searchInput.value.trim();
        let url = "{{ url('menu') }}?k=" + encodeURIComponent(keyword);

        fetch(url, {
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        })
        .then(response => response.text())
        .then(html => {
            menuContainer.innerHTML = html;
        })
        .catch(error => console.error("Error:", error));
    });
});
</script>

