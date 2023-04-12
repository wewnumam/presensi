<div class="container d-flex align-items-center justify-content-center vh-100">
    <meta http-equiv="refresh" content="5"> <!-- Auto refresh every 5 seconds -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var countdownElement = document.getElementById('countdown');
            var count = 5; // seconds
            countdownElement.textContent = 'refresh in ' + count + 's';
            var countdownInterval = setInterval(function() {
                count--;
                countdownElement.textContent = 'refresh in ' + count + 's';
                if (count === 0) {
                    clearInterval(countdownInterval);
                }
            }, 1000);
        });
    </script>
    <div class="d-grid gap-2">
        <p id="countdown" class="text-center"></p>
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= base_url('input?kode=' . $kode) ?>&choe=UTF-8" title="Link to manual input"/>
        <h1 class="text-center"><?= $kode ?></h1>
    </div>
</div>