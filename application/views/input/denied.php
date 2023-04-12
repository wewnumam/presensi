<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="d-grid gap-2">
    <?php if($message != null): ?>
        <div class="alert alert-danger" role="alert">
            <?= $message ?>
        </div>
    <?php endif; ?>
    <h5 class="text-center">Ingin input secara manual?</h5>
    <a class="btn btn-primary" href="<?= base_url('input') ?>" role="button">Input Manual</a>
    </div>
</div>