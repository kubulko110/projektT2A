<?php
/**
 * PHP skript pro zpracování zpětné vazby
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání dat z formuláře
    $firstName = htmlspecialchars($_POST['firstName'] ?? '');
    $lastName = htmlspecialchars($_POST['lastName'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $feedback = htmlspecialchars($_POST['feedback'] ?? '');

    // Zde by mohlo být uložení do databáze nebo odeslání e-mailu
    // Pro ukázku jen simulujeme úspěšné zpracování
    
    // Přesměrování na děkovací stránku s parametrem jména
    header("Location: dekuji.html?status=success&name=" . urlencode($firstName));
    exit();
} else {
    // Pokud někdo přistoupí přímo, přesměrujeme ho zpět na formulář
    header("Location: podekovani.html");
    exit();
}
?>
