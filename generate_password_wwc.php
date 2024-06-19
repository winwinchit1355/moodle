<?php
require_once(__DIR__ . '/config.php'); // Adjust the path if necessary
require_once($CFG->libdir . '/moodlelib.php');

$newpassword = 'Password@123'; // Replace with the new password

// Generate the password hash using Moodle's internal function
$hashedpassword = hash_internal_user_password($newpassword);

echo $hashedpassword;