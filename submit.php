<?php
// submit.php
date_default_timezone_set('America/Los_Angeles');

// sanitize and pull POST
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');

// require name + ≥1 contact method
if (!$name || (!$email && !$phone && !$address)) {
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/') . '?error=1');
    exit;
}

// build safe filename: replace non-letter/number with underscore
$timestamp = date('Ymd_His');
$safeName  = preg_replace('/[^A-Za-z0-9]/', '_', $name);
$filename  = __DIR__ . "/submissions/{$safeName}_{$timestamp}.txt";

// prepare content
$content  = "Name:    {$name}\n";
$content .= "Email:   {$email}\n";
$content .= "Phone:   {$phone}\n";
$content .= "Address: {$address}\n";
$content .= "Submitted: " . date('Y-m-d H:i:s') . "\n";

// write file
file_put_contents($filename, $content);

// redirect back with success
header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/') . '?success=1');
exit;
