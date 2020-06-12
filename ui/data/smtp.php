<?php
// The message
$message = "Line 1\r\nLine 2\r\nLine 3".time();

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send - replace email@domain.com with the recipient address
$bool = mail('antoniodiazduran@gmail.com', 'Here Is What I Wanted to Send', $message);

var_dump($bool);

