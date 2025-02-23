<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $vous = $_POST['vous'];
    $nom = $_POST['nom'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $consommation = $_POST['consommation'];
    $adresse = $_POST['adresse'];

    // Prepare email body
    $to = "info@bmpgroup.be, maqsoodanwar919@gmail.com"; // Replace with your email addresses
    $subject = "New Demande Form Submission";
    $body = "
        Vous êtes: $vous\n
        Nom: $nom\n
        Code postal: $code_postal\n
        Ville: $ville\n
        Email: $email\n
        Téléphone: $phone\n
        Consommation annuelle en KWh: $consommation\n
        Adresse complète: $adresse\n
    ";

    // Headers
    $headers = "From: noreply@bmpgroup.be\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if(mail($to, $subject, $body, $headers)) {
        echo json_encode(['success' => true, 'message' => 'Email sent successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Email sending failed']);
    }
}
?>
