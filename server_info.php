<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Server Info — Jakub Kresta</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="app">
        <header class="topbar">
            <button class="toggle-sidebar" aria-label="Přepnout postranní panel">☰</button>
            <div class="topbar-title">Jakub Kresta</div>
        </header>

        <aside class="sidebar" id="sidebar">
            <div class="brand">Rychlá pomůcka</div>
            <nav>
                <ul>
                    <li><a href="index.html">Domů</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <section class="hero">
                <h2>Informace ze serveru (PHP)</h2>
                <p>Tato stránka je generována pomocí PHP na straně serveru.</p>
            </section>

            <section class="panel">
                <h3>Systémové údaje</h3>
                <ul>
                    <li><strong>Aktuální čas:</strong> <?php echo date("H:i:s"); ?></li>
                    <li><strong>Aktuální datum:</strong> <?php echo date("d. m. Y"); ?></li>
                    <li><strong>Tvoje IP adresa:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
                    <li><strong>Verze PHP:</strong> <?php echo phpversion(); ?></li>
                </ul>
                <div style="margin-top: 20px;">
                    <a href="index.html" class="btn-submit" style="text-decoration: none;">Zpět na hlavní stránku</a>
                </div>
            </section>
        </main>
    </div>
</body>
</html>