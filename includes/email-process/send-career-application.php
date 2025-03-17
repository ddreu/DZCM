<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $cv = $_FILES['cv']['tmp_name'];
        $cv_name = $_FILES['cv']['name'];
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to upload CV.']);
        exit;
    }

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
        $mail->addAttachment($cv, $cv_name);

        $mail->isHTML(true);
        $mail->Subject = 'Job Application from ' . $first_name . ' ' . $last_name;
        $mail->Body = "
            <h3>Job Application Details</h3>
            <p><b>Name:</b> {$first_name} {$last_name}</p>
            <p><b>Email:</b> {$email}</p>
            <p><b>Phone:</b> {$phone}</p>
            <p><b>Message:</b> {$message}</p>
        ";

        if ($mail->send()) {
            $mail->clearAddresses();
            $mail->clearAttachments();

            $mail->addAddress($email);
            $mail->Subject = 'Thank you for your application!';
            $mail->Body = "
    <h3>Dear {$first_name} {$last_name},</h3>
    <p>Thank you for applying for the position. We have received your application and will review it shortly.</p>
    <p>If you are shortlisted, our team will contact you via email or phone.</p>
    <p>Thank you and best regards,</p>
    <p><b>Company HR Department</b></p>
";

            $mail->send();

            echo json_encode(['success' => true, 'message' => 'Application submitted successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to send email to company.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
