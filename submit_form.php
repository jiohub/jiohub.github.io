<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    $to = "???@???.com";

    $subject = "STEM4Agri";

    $headers = "From: $name <$email>";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $messageSent = mail($to, $subject, $email_content, $headers);

    if ($messageSent) {
        header('Location: submit_thanks.php');
        exit;
    } else {
        header('Location: submit_error.php');
        exit;
    }
}
?>