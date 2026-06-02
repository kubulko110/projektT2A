<?php
/**
 * PHP skript pro zpracování zpětné vazby a uložení do souboru
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Získání dat z formuláře
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $feedback = trim($_POST['feedback'] ?? '');

    // 2. KONTROLA PRÁZDNÝCH DAT (Jméno a Zpráva jsou povinné)
    if (empty($firstName) || empty($feedback)) {
        header("Location: podekovani.html?status=error");
        exit();
    }

    // Bezpečné ošetření pro zápis
    $firstName = htmlspecialchars($firstName);
    $lastName = htmlspecialchars($lastName);
    $email = htmlspecialchars($email);
    $address = htmlspecialchars($address);
    $phone = htmlspecialchars($phone);
    $feedback = htmlspecialchars($feedback);

    // 3. Formátování dat pro uložení
    $data = "--- " . date("Y-m-d H:i:s") . " ---\n";
    $data .= "Jméno: $firstName $lastName\n";
    $data .= "Email: $email\n";
    $data .= "Adresa: $address\n";
    $data .= "Telefon: $phone\n";
    $data .= "Zpráva: $feedback\n";
    $data .= "---------------------------\n\n";
    
    // 4. Uložení do souboru feedback.txt
    file_put_contents("feedback.txt", $data, FILE_APPEND);
    
    // 5. Přesměrování na děkovací stránku
    header("Location: dekuji.html?status=success&name=" . urlencode($firstName));
    exit();
} else {
    // Pokud někdo přistoupí přímo, přesměrujeme ho zpět na formulář
    header("Location: podekovani.html");
    exit();
}
?>