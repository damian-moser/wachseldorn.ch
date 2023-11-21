<?php
require 'config.php';

$con = new mysqli($host, $user, $pass, $name);

if ($con->connect_error) {
    die("Verbindungsfehler: " . $con->connect_error);
}
