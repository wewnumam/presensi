<div class="container">
    <div class="columns is-centered is-vcentered" style="height: 80vh">
        <div class="column is-4">
        <h1 class="title">Login page</h1>
        <?= validation_errors(); ?>
        <?= $this->session->flashdata('msg'); ?>
        <form method="POST">
            <div class="field">
                <label class="label">Username</label>
                <div class="control">
                    <input class="input" type="text" name="username" value="<?= set_value('username'); ?>" placeholder="username">
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" value="<?= set_value('password'); ?>" placeholder="password">
                </div>
            </div>
            <button type="submit" class="button is-primary is-fullwidth">Log in</button>
        </form>
        </div>
    </div>
</div>