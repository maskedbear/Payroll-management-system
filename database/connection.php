<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';


    // $dbname = 'payroll';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=payroll", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch (\Exception $e) {
        $error_message = $e->getMessage();
    }    
?>
