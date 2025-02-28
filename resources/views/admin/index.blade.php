<h1 class="text-center mt-5 bg-danger"><?= session()->get('is_admin') ?></h1>

<form action="{{ @url('logout') }}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>