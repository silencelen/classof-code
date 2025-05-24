<?php

date_default_timezone_set('America/Los_Angeles');

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');

if (!$name || (!$email && !$phone && !$address)) {
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/') . '?error=1');
    exit;
}


$timestamp = date('Ymd_His');
$safeName  = preg_replace('/[^A-Za-z0-9]/', '_', $name);

$filename  = 'C:/secure/submissions/' . "{$safeName}_{$timestamp}.txt";

// prepare content
$content  = "Name:    {$name}\n";
$content .= "Email:   {$email}\n";
$content .= "Phone:   {$phone}\n";
$content .= "Address: {$address}\n";
$content .= "Submitted: " . date('Y-m-d H:i:s') . "\n";

file_put_contents($filename, $content);

header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/') . '?success=1');
exit;
