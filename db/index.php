<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'skd_uts';

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die('Gagal terhubung ke database');
