<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">Selangkah lagi!</h5>
        <p>Konfirmasi identitas Anda:</p>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?= $data->nim ?></td>
            <td><?= $data->nama ?></td>
            </tr>
        </tbody>
        </table>
        <form action="input/assign" method="post" class="d-grid gap-2">
            <input type="hidden" name="id_user" value="<?= get_cookie('id_user'); ?>">
            <input type="hidden" name="kode" value="<?= $_GET['kode']; ?>">
            <input class="btn btn-primary" type="submit" value="Benar">
            <a class="btn btn-danger" href="<?= base_url('input/logout') ?>" role="button">Salah</a>
        </form>
    </div>
    </div>
</div>