<?php
// Sending emails via mstmp 
// install msmtp with apt install msmtp
// Configuration for PHP is on php.ini on CLI and APACHE directory in /etc
// Uncomment ;sendmail_path = 
// and Add /usr/bin/msmtp -t
// 
// Main configuration file for mstmp is /etc/mstmprc
// Disabled the 2-verification method on gmail and created a password for it
// Gmail account joeycamanei
//
// The message
$message = "Instance-2\r\nTime:".time();

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send - replace email@domain.com with the recipient address
$bool = mail('antoniodiazduran@gmail.com', 'Here Is What I Wanted to Send', $message);

var_dump($bool);

