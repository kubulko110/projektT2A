<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $feedback = trim($_POST['feedback'] ?? '');

    if (empty($firstName) || empty($feedback)) {
        header("Location: podekovani.html?status=error");
        exit();
    }

    $firstName = htmlspecialchars($firstName);
    $lastName = htmlspecialchars($lastName);
    $email = htmlspecialchars($email);
    $address = htmlspecialchars($address);
    $phone = htmlspecialchars($phone);
    $feedback = htmlspecialchars($feedback);

    $data = "--- " . date("Y-m-d H:i:s") . " ---\n";
    $data .= "Jméno: $firstName $lastName\n";
    $data .= "Email: $email\n";
    $data .= "Adresa: $address\n";
    $data .= "Telefon: $phone\n";
    $data .= "Zpráva: $feedback\n";
    $data .= "---------------------------\n\n";
    
    file_put_contents("feedback.txt", $data, FILE_APPEND);
    
    header("Location: dekuji.html?status=success&name=" . urlencode($firstName));
    exit();
} else {

    header("Location: podekovani.html");
    exit();
}
?>