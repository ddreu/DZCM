<?php

require_once 'includes/connect.php';

$conn->select_db("dezcom");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO quotes (name, email, phone, website, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $value1, $value2, $phone, $website, $message);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'email@gmail.com';
            $mail->Password = 'password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('');
            $mail->addAddress('andrewbucedeguzman@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = "New Quote Request from $value1";
            $mail->Body = "
                <h2>New Quote Request</h2>
                <p><strong>Name:</strong> $value1</p>
                <p><strong>Email:</strong> $value2</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Website:</strong> $website</p>
                <p><strong>Message:</strong> $message</p>
            ";

            $mail->send();

            $mail->clearAddresses();
            $mail->clearAttachments();
            $mail->addAddress($value2);
            $mail->Subject = "Thank you for requesting a quote!";
            $mail->Body = "
                <h2>Thank you for reaching out, $value1!</h2>
                <p>We have received your request and will get back to you shortly.</p>
                <p><strong>Details you submitted:</strong></p>
                <p>Name: $value1</p>
                <p>Email: $value2</p>
                <p>Phone: $phone</p>
                <p>Website: $website</p>
                <p>Message: $message</p>
                <br>
                <p>Best regards,<br>Your Company</p>
            ";

            $mail->send();

            echo "Quote submitted successfully! We will get back to you shortly.";
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
