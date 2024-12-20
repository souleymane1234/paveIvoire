<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure les fichiers de PHPMailer (assurez-vous de télécharger PHPMailer depuis GitHub)
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Vérifiez que les champs ne sont pas vides
    if (!empty($name) && !empty($email) && !empty($message)) {
        $mail = new PHPMailer(true);

        try {
            // Configuration SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'konatesouleymane42@gmail.com'; // Votre adresse Gmail
            $mail->Password = 'jbenexcgldfiehwy'; // Votre mot de passe ou mot de passe d'application
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuration de l'e-mail
            $mail->setFrom('konatesouleymane42@gmail.com', 'Pave ivoire');
            $mail->addAddress('konatesouleymane42@gmail.com'); // Adresse de destination
            $mail->Subject = 'Nouveau message de ' . $name;
            $mail->Body = "Nom : $name\nEmail : $email\nMessage :\n$message";

            // Envoyer l'e-mail
            $mail->send();
            echo 'Votre message a été envoyé avec succès.';
        } catch (Exception $e) {
            echo "Une erreur est survenue lors de l'envoi : {$mail->ErrorInfo}";
        }
    } else {
        echo 'Veuillez remplir tous les champs.';
    }
} else {
    echo 'Méthode de requête non autorisée.';
}
?>