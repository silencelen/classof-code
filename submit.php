<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Los_Angeles');

$name    = isset($_POST['name']) ? trim(strip_tags(htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';
$email   = isset($_POST['email']) ? trim(strip_tags(htmlspecialchars($_POST['email'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';
$phone   = isset($_POST['phone']) ? trim(strip_tags(htmlspecialchars($_POST['phone'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';
$address = isset($_POST['address']) ? trim(strip_tags(htmlspecialchars($_POST['address'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';

if (strlen($name) > 100)    $name    = substr($name, 0, 100);
if (strlen($email) > 320)   $email   = substr($email, 0, 320);
if (strlen($phone) > 30)    $phone   = substr($phone, 0, 30);
if (strlen($address) > 500) $address = substr($address, 0, 500);

if (!$name || (!$email && !$phone && !$address)) {
    die('Missing name or contact info.');
}

if ($email) {
    if (!preg_match('/^[^@\s]+@[^@\s\.]+\.[^@\s\.]+$/D', $email)) {
        die('Bad email.');
    }
}

if ($phone) {
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) !== 10) {
        die('Bad phone.');
    }
    $phone = '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6);
}

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $submissionsDir = 'C:/secure/submissions/';
} else {
    $submissionsDir = '/var/www/submissions/';
}

if (!is_dir($submissionsDir)) {
    if (!@mkdir($submissionsDir, 0755, true)) {
        die("Could not create submissions directory");
    }
}

$timestamp = date('Ymd_His');
$safeName  = preg_replace('/[^A-Za-z0-9]/', '_', $name);
$safeName  = substr($safeName, 0, 50);
$filename  = $submissionsDir . "{$safeName}_{$timestamp}.txt";

$content  = "Name:    {$name}\n";
$content .= "Email:   {$email}\n";
$content .= "Phone:   {$phone}\n";
$content .= "Address: {$address}\n";
$content .= "Submitted: " . date('Y-m-d H:i:s') . "\n";

if (!file_put_contents($filename, $content)) {
    die("Could not write submission file");
}

$powerAutomateUrl = 'https://prod-169.westus.logic.azure.com:443/workflows/2ecf7b7537264329a1e160889e9331aa/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=WNMu1gKDHHzCxhi7RVuBzRJnJJmRvmvrse8Yb6u8L1A';

if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (!function_exists('curl_init')) {
        die('cURL is NOT enabled in PHP');
    }

    $data = [
        'email' => $email,
        'name' => $name
    ];
    $ch = curl_init($powerAutomateUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        die("cURL error: " . curl_error($ch));
    }
    curl_close($ch);
}

header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/') . '?success=1');
exit;
