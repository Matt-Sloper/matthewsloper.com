<?php

$recipient = "matthew.sloper@gmail.com";
$visitor_email = "";
$visitor_name = "";
$msg = "";
$email_title ="Message submitted from matthewsloper.com";

if($_POST) {

    /* honeypot field should be null unless form has been
    submitted by a bot */
    if($_POST['tel'] != '') {
        echo '<p>Spambot detected</p>';
        return(-1);
    }

    if(isset($_POST['name'])) {
        $visitor_name = validate($_POST['name']);
    }

    if(isset($_POST['email'])) {
        $visitor_email = validate($_POST['email']);
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $visitor_email);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);

        $headers  = 'MIME-Version: 1.0' . "\r\n" .'Content-type: text/html; charset=utf-8' . "\r\n" .
                    'From: ' . $visitor_email . "\r\n";
    }

    if(isset($_POST['message'])) {
        $msg = validate($_POST['message']);
    }

    if(mail($recipient, $email_title, $msg, $headers)) {
        echo "<h1>Thank you for contacting me, $visitor_name. You will get a reply within 24 hours.</h1>";
        return(0);
    } else {
        echo '<h1>We are sorry but the email did not go through.</h1>';
        return(-1);
    }

} else {
    echo '<p>Error submitting form</p>';
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>