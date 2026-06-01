<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Serverové informace — PHP</title>
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
  <div class="app">
    <main class="content">
      <section class="panel">
        <h2>Informace ze serveru</h2>
        <p>Tato stránka je generována pomocí <strong>PHP</strong>.</p>
        <ul>
          <li><strong>Aktuální čas na serveru:</strong> <?php echo date("H:i:s"); ?></li>
          <li><strong>Aktuální datum:</strong> <?php echo date("d. m. Y"); ?></li>
          <li><strong>Tvoje IP adresa:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
          <li><strong>Verze PHP:</strong> <?php echo phpversion(); ?></li>
        </ul>
        <a href="index.html" class="btn-submit" style="display: inline-block; text-decoration: none; margin-top: 20px;">Zpět na hlavní stránku</a>
      </section>
    </main>
  </div>
</body>
</html>
