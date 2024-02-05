<?php

// DATABASE CONNECTION
$con = mysqli_connect('localhost', 'root', '', 'library_db');

if (!$con) {
    echo 'Database not connected!';
    die();
}