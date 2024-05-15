<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sesuaikan dengan alamat email yang ingin Anda gunakan
    $to_email = "mentariretn000@gmail.com";
    $subject = $_POST['subject'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $name <$email>\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Send email
    if (mail($to_email, $subject, $message, $headers)) {
        echo "Email successfully sent.";
    } else {
        echo "Email sending failed.";
    }
}
?>