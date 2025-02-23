<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract the form data
    $vous = $_POST['vous'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $interests = isset($_POST['interests']) ? implode(", ", $_POST['interests']) : "None";
    $message = $_POST['message'];

    // Prepare the email body
    $to = "info@bmpgroup.be, maqsoodanwar919@gmail.com";
    $subject = "BMP Solar Contact Us Form Submission";
    $body = "
        Vous êtes: $vous\n
        Nom: $nom\n
        Email: $email\n
        Téléphone: $phone\n
        Adresse complète: $adresse\n
        Intéressé par: $interests\n
        Message: $message\n
    ";

    // Headers
    $headers = "From: noreply@bmpgroup.be\r\n";  // Updated From email
    $headers .= "Reply-To: maqsoodanwar919@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['success' => true, 'message' => 'Email sent successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Email sending failed']);
    }
}
?>
