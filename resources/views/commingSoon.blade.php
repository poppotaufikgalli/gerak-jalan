<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-KK4YED9S43"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
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
      height: 100vh; /* Short viewport height */
      overflow-y: scroll; /* Displays the vertical scrollbar */
      border: 1px solid #ccc;
    }

    /* 2. The tall canvas inside */
    .tall-background-content {
      /* Set the height matching or exceeding your large image */
      height: 130%; 
      width: 100%;
      
      background-image: url('2026-coming-soon.png');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: top center;
    }


  </style>
</head>
<body>
  <div class="d-flex align-items-center justify-content-center min-vh-100 text-center px-3">
    <div class="scrollable-container">
      <div class="tall-background-content">
        <!-- Overlay text or content goes here -->
      </div>
    </div>
  </div>
</body>
</html>
