<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card">
    <div class="card-body">
        <div class="alert alert-success" role="alert">Presensi BERHASIL!</div>
        <p>Detail:</p>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Kode</th>
            <th scope="col">Waktu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?= $data->nim ?></td>
            <td><?= $data->nama ?></td>
            <td><?= $data->kode ?></td>
            <td>
            <?php
                // Convert milliseconds to seconds by dividing by 1000
                $unixTimestampSeconds = round($data->waktu / 1000);

                // Create a DateTime object with the Unix timestamp in GMT time zone
                $dateTime = new DateTime("@$unixTimestampSeconds", new DateTimeZone('GMT'));

                // Set the time zone to GMT+7
                $gmtPlus7 = new DateTimeZone('GMT+7');
                $dateTime->setTimezone($gmtPlus7);

                // Format the DateTime object to a human-readable date string
                $dateString = $dateTime->format('D, j F Y, H:i:s');

                // Output the human-readable date string
                echo $dateString;
            ?>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
</div>