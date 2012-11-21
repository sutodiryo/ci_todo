<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//smtp for gMail
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = ''; // YOUR GMAIL USERNAME
$config['smtp_pass'] = ''; // YOUR GMAIL PASSWORD
$config['mailtype'] = 'html';
$config['newline'] = "\r\n";

