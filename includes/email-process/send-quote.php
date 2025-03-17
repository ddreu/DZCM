<?php

require_once 'includes/connect.php';

$conn->select_db("dezcom");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'] ?? '';
    $website = $_POST['website'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO quote (name, email, phone, website, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $website, $message);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'posemail@posdzcm.shop';
            $mail->Password = 'Codez1984@';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom("posemail@posdzcm.shop", "DZCM IT Services");
            $mail->addAddress('andrewbucedeguzman@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = "New Quote Request from $name";
            $mail->Body = "
                <h2>New Quote Request</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Website:</strong> $website</p>
                <p><strong>Message:</strong> $message</p>
            ";

            $mail->send();

            $mail->clearAddresses();
            $mail->clearAttachments();
            $mail->addAddress($email);
            $mail->Subject = "Thank you for requesting a quote!";
            $mail->Body = "
                <h2>Thank you for reaching out, $name!</h2>
                <p>We have received your request and will get back to you shortly.</p>
                <p><strong>Details you submitted:</strong></p>
                <p>Name: $name</p>
                <p>Email: $email</p>
                <p>Phone: $phone</p>
                <p>Website: $website</p>
                <p>Message: $message</p>
                <br>
                <p>Best regards,<br>DZCM IT Services</p>
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
