<?php
session_start();
if(!isset($_SESSION['user'])) header('location: index.php');

include('database/connection.php');

if(isset($_GET['EID'])) {
    $EID = $_GET['EID'];

    $query = 'DELETE FROM employee WHERE EID = :EID';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':EID', $EID);
    $stmt->execute();

    header('location: dashboard.php');
    exit();
} else {
    header('location: dashboard.php');
    exit();
}
?>