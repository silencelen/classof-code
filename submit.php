<?php

date_default_timezone_set('America/Los_Angeles');

$name = isset($_POST['name']) ? trim(strip_tags(htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';
$email = isset($_POST['email']) ? trim(strip_tags(htmlspecialchars($_POST['email'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';
$phone = isset($_POST['phone']) ? trim(strip_tags(htmlspecialchars($_POST['phone'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';
$address = isset($_POST['address']) ? trim(strip_tags(htmlspecialchars($_POST['address'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';

if (strlen($name) > 100) $name = substr($name, 0, 100);
if (strlen($email) > 320) $email = substr($email, 0, 320);
if (strlen($phone) > 30) $phone = substr($phone, 0, 30);
if (strlen($address) > 500) $address = substr($address, 0, 500);

if (!$name || (!$email && !$phone && !$address)) {
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/') . '?error=1');
    exit;
}

if ($email) {
    if (!preg_match('/^[^@\s]+@[^@\s\.]+\.[^@\s\.]+$/D', $email)) {
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/') . '?error=bad_email');
        exit;
    }
}

if ($phone) {
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) !== 10) {
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/') . '?error=bad_phone');
        exit;
    }

    $phone = '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6);
}
-
$timestamp = date('Ymd_His');
$safeName = preg_replace('/[^A-Za-z0-9]/', '_', $name);
$safeName = substr($safeName, 0, 50);
$filename = 'C:/secure/submissions/' . "{$safeName}_{$timestamp}.txt";

$content  = "Name:    {$name}\n";
$content .= "Email:   {$email}\n";
$content .= "Phone:   {$phone}\n";
$content .= "Address: {$address}\n";
$content .= "Submitted: " . date('Y-m-d H:i:s') . "\n";

file_put_contents($filename, $content);

header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/') . '?success=1');
exit;
