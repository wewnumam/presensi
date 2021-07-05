<section class="hero is-info welcome is-small mb-4">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Hello, Admin.
            </h1>
            <h2 class="subtitle">
                I hope you are having a great day!
            </h2>
        </div>
    </div>
</section>
<section class="info-tiles mb-4">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?= $user_count ?></p>
                <p class="subtitle">Users</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?= $log_count ?></p>
                <p class="subtitle">Logs</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?= $used_code_count ?></p>
                <p class="subtitle">Code Used</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?= $unused_code_count ?></p>
                <p class="subtitle">Code Unused</p>
            </article>
        </div>
    </div>
</section>
<div class="column is-6">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Generate Code
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                <div class="control has-icons-left has-icons-right">
                    <div id="result" class="hero is-light p-2 mb-2"></div>
                    <form id="generateForm">
                        <div class="field">
                            <label id="inputAmount" class="label">Amount</label>
                            <div class="control">
                                <input name="amount" class="input" type="number" placeholder="amount">
                            </div>
                        </div>
                        <input type="submit" value="Generate" class="button is-primary is-fullwidth">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#result').hide();
    $('#generateForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('logs/generate') ?>',
            data: {amount: $('input[name=amount]').val()},
            success: function(result) {
                $('#result').show();
                $('#result').html(result);
            }
         });
    });
</script>