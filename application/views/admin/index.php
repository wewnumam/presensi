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
<div class="container d-flex align-items-center justify-content-center vh-100">
    <meta http-equiv="refresh" content="5"> <!-- Auto refresh every 5 seconds -->
    <div class="d-grid gap-2">
        <h3 class="text-center">Scan kode di bawah!</h3>
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= base_url('input?kode=' . $kode) ?>&choe=UTF-8" title="Link to manual input"/>
        <h1 class="text-center"><?= $kode ?></h1>
        <p id="countdown" class="text-center"></p>
    </div>
    <div class="d-grid p-5">
        <h3 class="text-center mb-5">Presensi terbaru</h3>
        <?php foreach ($data as $d): ?>
        <?php if ($data[0]->waktu == $d->waktu): ?>
        <div class="alert alert-success" role="alert">
        <?php else: ?>
        <div class="alert alert-light" role="alert">
        <?php endif; ?>
        <?php
            // Convert milliseconds to seconds by dividing by 1000
            $unixTimestampSeconds = round($d->waktu / 1000);

            // Create a DateTime object with the Unix timestamp in GMT time zone
            $dateTime = new DateTime("@$unixTimestampSeconds", new DateTimeZone('GMT'));

            // Set the time zone to GMT+7
            $gmtPlus7 = new DateTimeZone('GMT+7');
            $dateTime->setTimezone($gmtPlus7);

            // Format the DateTime object to a human-readable date string
            $dateString = $dateTime->format('H:i');

            // Output the human-readable date string
            echo '<strong>' . $dateString . '</strong> ' . $d->nama . ' (' . $d->kode . ')';
            ?>
        </div>
        <?php endforeach; ?>
        <div class="alert alert-light" role="alert">...</div>
    </div>
</div>