<!DOCTYPE html>
<html lang="id">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-KK4YED9S43"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-KK4YED9S43');
  </script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gerak Jalan Proklamasi 2026 - Tanjungpinang</title>
  @vite(['resources/js/app.js', 'resources/scss/styles.scss'])

  <style>
    /* 1. The visible window frame */
    .scrollable-container {
      width: 100%;
      height: 100vh;
      /* Short viewport height */
      overflow-y: scroll;
      /* Displays the vertical scrollbar */
      border: 1px solid #ccc;
    }

    /* 2. The tall canvas inside */
    .tall-background-content {
      /* Set the height matching or exceeding your large image */
      height: 100%;
      width: 100%;

      background-image: url('img/coming-soon-2026.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: top center;
      filter: blur(3px);
      -webkit-filter: blur(3px);
    }
  </style>
</head>

<body>
  <div class="d-flex align-items-center justify-content-center min-vh-100 text-center px-3">
    <div class="scrollable-container">
      <div class="tall-background-content">
      </div>
      <div class="position-absolute top-50 start-50 translate-middle">
        <div class="d-flex align-items-center">
          <img src="{{asset('img/top-banner-2026-2.jpeg')}}" style="height: 98vh" />
        </div>
      </div>
    </div>
  </div>
</body>

</html>