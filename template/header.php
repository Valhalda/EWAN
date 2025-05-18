<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title = 'Sistem Pemeliharaan Komputer';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['title']?></title>
    
    <!-- Link ke file CSS Bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap.min.css"> 
    <!-- <link rel="stylesheet" href="assets/bootstrap.min.css">  -->
    <link rel="stylesheet" href="style.css"> <!-- Link ke file CSS -->
</head>
<body class="bg-light">