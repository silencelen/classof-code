<!--b1.0-->
<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Los_Angeles');

$isSecure = false;
if (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
    (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
    (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on')
) {
    $isSecure = true;
}

if (!$isSecure) {
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}

if (!isset($_POST['csrf']) || !isset($_SESSION['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
    die('CSRF token invalid or missing.');
}

$expectedHost = 'whsclassof1985.com';
if (
    !isset($_SERVER['HTTP_REFERER']) ||
    parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) !== $expectedHost
) {
    die('Invalid referer header.');
}

if (!empty($_POST['hp'])) {
    die('Spam detected.');
}

if (isset($_POST['ts'])) {
    $ts_submitted = intval($_POST['ts']);
    $ts_now = time();
    if (($ts_now - $ts_submitted) < 5) {
        die('Too quick—please try again.');
    }
} else {
    die('Bad submission.');
}

$spam_keywords = ['youtube growth', 'buy subscribers', 'real followers', 'promote channel'];
foreach ($spam_keywords as $keyword) {
    if (stripos($_POST['address'] ?? '', $keyword) !== false) {
        die('Spam content detected.');
    }
}

$ip = $_SERVER['REMOTE_ADDR'];
$rateFile = sys_get_temp_dir() . '/form_rate_' . md5($ip);
if (file_exists($rateFile) && (time() - filemtime($rateFile)) < 30) {
    die('Please wait before submitting again.');
}
touch($rateFile);

$name    = isset($_POST['name'])    ? trim(strip_tags(htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';
$email   = isset($_POST['email'])   ? trim(strip_tags(htmlspecialchars($_POST['email'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';
$phone   = isset($_POST['phone'])   ? trim(strip_tags(htmlspecialchars($_POST['phone'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';
$address = isset($_POST['address']) ? trim(strip_tags(htmlspecialchars($_POST['address'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'))) : '';

if (strlen($name) > 100)    $name    = substr($name, 0, 100);
if (strlen($email) > 320)   $email   = substr($email, 0, 320);
if (strlen($phone) > 30)    $phone   = substr($phone, 0, 30);
if (strlen($address) > 500) $address = substr($address, 0, 500);

if (!$name || (!$email && !$phone && !$address)) {
    die('Missing name or contact info.');
}

if ($email && !preg_match('/^[^@\s]+@[^@\s\.]+\.[^@\s\.]+$/D', $email)) {
    die('Bad email.');
}

if ($phone) {
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) !== 10) {
        die('Bad phone.');
    }
    $phone = '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6);
}

if ($address && preg_match('/https?:\/\/|www\./i', $address)) {
    die('Links are not allowed in the address field.');
}

$submissionsDir = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'C:/secure/submissions/' : '/var/www/submissions/';
if (!is_dir($submissionsDir)) {
    if (!@mkdir($submissionsDir, 0755, true)) {
        die("Could not create submissions directory");
    }
}

$timestamp = date('Ymd_His');
$safeName  = preg_replace('/[^A-Za-z0-9]/', '_', $name);
$safeName  = substr($safeName, 0, 50);
$filename  = $submissionsDir . "WHS_{$safeName}_{$timestamp}.txt";

$content  = "Name:    {$name}\n";
$content .= "Email:   {$email}\n";
$content .= "Phone:   {$phone}\n";
$content .= "Address: {$address}\n";
$content .= "Submitted: " . date('Y-m-d H:i:s') . "\n";

if (!file_put_contents($filename, $content)) {
    die("Could not write submission file");
}

$powerAutomateUrl = 'POWER_URL_OBF';

if ($powerAutomateUrl && $email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (!function_exists('curl_init')) {
        die('cURL is NOT enabled in PHP');
    }

    $data = ['email' => $email, 'name' => $name];
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
