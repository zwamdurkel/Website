<?php
if ( isset( $_POST["email"] ) && isset( $_POST["subject"] ) && isset( $_POST["message"] ) && isset( $_POST["name"] ) ) {
    $email = $_POST["email"];
    $messagesmall = nl2br($_POST["message"], false);
    $to = 'website.a@riswick.net';
    $subject = $_POST["subject"];
    $message = "<h2>You have received a new message from your site,</h2>\n" . 
                $email . " (" . $_POST["name"] . ") asked: <br><br>
                <table width='100%' border='0' cellpadding='0' cellspacing='0'>
                <tr>
                    <td width='60%' style='background-color: #eee; color: #222; font-size:15px; font-family:Arial, Helvetica, sans-serif; font-weight: bold; padding:12px;'>
                        " . $messagesmall . "
                    </td>
                </tr>
                </table>
                ";
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: '. $email . "\r\n" .
               'MIME-Version: 1.0' . "\r\n" .
               'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    header('Location: ../contact?error=none');
} else {
    header('Location: ../contact?error=emptyfield');
    exit();
}
?>