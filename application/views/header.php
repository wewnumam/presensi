<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABSENAJA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <script>
    // Function to format date and time
    function formatDateTime(date) {
      var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

      var day = days[date.getUTCDay()];
      var dayOfMonth = date.getUTCDate();
      var month = months[date.getUTCMonth()];
      var year = date.getUTCFullYear();
      var hours = ('0' + (date.getUTCHours() + 7)).slice(-2);
      var minutes = ('0' + date.getUTCMinutes()).slice(-2);
      var seconds = ('0' + date.getUTCSeconds()).slice(-2);

      return day + ', ' + dayOfMonth + ' ' + month + ' ' + year + ', ' + hours + ':' + minutes + ':' + seconds;
    }

    // Function to update time in DOM
    function updateTime() {
      var currentDate = new Date();
      var formattedDateTime = formatDateTime(currentDate);
      document.getElementById('current-time').textContent = formattedDateTime;
    }

    // Update time every second
    setInterval(updateTime, 1000);
  </script>
  <h3 class="mt-1 text-center" id="current-time" style="margin-bottom: -5rem;"></h3>