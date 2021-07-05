<section class="section">
    <div class="columns is-centered is-vcentered" style="height: 80vh">
        <div class="column is-half ">
            <h1 class="title has-text-centered">
                CODE: <span id="code"></span>
            </h1>
        </div>
    </div>
</section>

<script>
    $(function() {
        setInterval(function() {
            $.getJSON("<?= base_url('logs/load') ?>", function(data) {
            $('#code').html(data.data);
            }).fail(function() {
                $('#code').html('An error has occurred.');
            });
        }, 2000);
    });
</script>