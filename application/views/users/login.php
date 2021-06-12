<div class="container">
    <h1 class="title">Login page</h1>
    <div class="columns">
        <div class="column is-4">
        <form action="<?= base_url('user/check') ?>" method="post">
        <div class="field">
            <label class="label">Username</label>
            <div class="control">
                <input class="input" type="text" name="username" placeholder="username">
            </div>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class="input" type="password" name="password" placeholder="password">
            </div>
        </div>
        <button type="submit" class="button is-primary is-fullwidth">Log in</button>
    </form>
        </div>
    </div>
</div>