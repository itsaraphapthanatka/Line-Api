<?php
$info = array(
    'host' => 'localhost',
    'user' => 'itsaraphap',
    'port' => '3306',
    'password' => 'Mc5s714040##',
    'dbname' => 'lassie'
    // 'host' => '134.209.98.84',
    // 'user' => 'root',
    // 'port' => '3306',
    // 'password' => 'Mc5s7140',
    // 'dbname' => 'k_house_db'
);
$conn = mysqli_connect($info['host'], $info['user'], $info['password'], $info['dbname']) or die('Error connection database!');
mysqli_set_charset($conn, 'utf8');
?>
