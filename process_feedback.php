<?php
/**
 * PHP skript pro zpracování zpětné vazby a uložení do souboru
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání dat z formuláře
    $firstName = htmlspecialchars($_POST['firstName'] ?? 'Anonym');
    $lastName = htmlspecialchars($_POST['lastName'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $feedback = htmlspecialchars($_POST['feedback'] ?? '');

    // Formátování dat pro uložení
    $data = "--- " . date("Y-m-d H:i:s") . " ---\n";
    $data .= "Jméno: $firstName $lastName\n";
    $data .= "Email: $email\n";
    $data .= "Zpráva: $feedback\n";
    $data .= "---------------------------\n\n";
    
    // Uložení do souboru feedback.txt
    file_put_contents("feedback.txt", $data, FILE_APPEND);
    
    // Přesměrování na děkovací stránku s parametrem jména
    header("Location: dekuji.html?status=success&name=" . urlencode($firstName));
    exit();
} else {
    // Pokud někdo přistoupí přímo, přesměrujeme ho zpět na formulář
    header("Location: podekovani.html");
    exit();
}
?>