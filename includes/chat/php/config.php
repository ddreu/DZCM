<?php
// $conn = new mysqli("localhost", "u170638109_teomatenzo", "TeoMatenzo2024", "u170638109_teomatenzo2024");
$conn = new mysqli("localhost", "root", "", "dezcom");
// The date
date_default_timezone_set('UTC');
$plain_date = date('Y-m-d H:i:s');
/**
 * or... alternatively set it using a string value
$plain_date = '2020-01-01 00:00:00';
 */

// Prepare the timezones
$utc = new DateTimeZone('+0000');
$ph  = new DateTimeZone('+0800');

// Conversion procedure
$datetime = new DateTime($plain_date, $utc); // UTC timezone
$datetime->setTimezone($ph); // Philippines timezone

$dateentry = $datetime->format('Y-m-d H:i:s');
if ($conn->connect_error) {
    die("Connection Faiied" . $conn->connect_error);
}
