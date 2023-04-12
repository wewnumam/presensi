<div class="container d-flex align-items-center justify-content-center vh-100">
    <form action="" method="post">
        <div class="d-grid gap-2">
            <?php if($message != null): ?>
                <div class="alert alert-danger" role="alert">
                  <?= $message ?>
                </div>
            <?php endif; ?>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">NIM</span>
                <input name="nim" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">Password</span>
                <input name="password" type="password" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
            </div>
            <input class="btn btn-primary" type="submit" value="Konfirmasi">
        </div>
    </form>
</div>