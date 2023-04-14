<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $to = 'farouqoguntoye05@gmail.com';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = 'New message from ' . $name;

  $headers = array();
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/plain; charset=UTF-8';
  $headers[] = 'From: ' . $name . ' <' . $email . '>';
  $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
  $headers[] = 'X-Mailer: PHP/' . phpversion();

  $message_body = "Name: $name\nEmail: $email\n\n$message";

  $success = mail($to, $subject, $message_body, implode("\r\n", $headers));

  if ($success) {
    http_response_code(200);
  } else {
    http_response_code(500);
  }
}

?>
