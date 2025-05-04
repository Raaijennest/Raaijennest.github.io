<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = htmlspecialchars(trim($_POST['naam']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $bericht = htmlspecialchars(trim($_POST['bericht']));

    // Ontvanger en onderwerp
    $ontvanger = "schapenzolder@gmail.com"; // Vervang dit met jouw echte e-mailadres
    $onderwerp = "(test) B&B Schapenzolder mogelijke overnachter";

    // Berichtinhoud
    $inhoud = "Naam: $naam\n";
    $inhoud .= "E-mailadres: $email\n\n";
    $inhoud .= "Bericht:\n$bericht\n";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Verstuur de e-mail
    if (mail($ontvanger, $onderwerp, $inhoud, $headers)) {
        echo "<p>Bedankt voor je bericht, $naam. We nemen spoedig contact met je op.</p>";
    } else {
        echo "<p>Er is een fout opgetreden. Probeer het later opnieuw.</p>";
    }
} else {
    echo "<p>Ongeldige aanvraag.</p>";
}
?>
