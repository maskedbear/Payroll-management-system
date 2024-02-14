
    <!-- // session_start(); -->
    <!-- // var_dump($_POST); -->
    <!-- // var_dump($_SESSION); -->


<?php
    session_start();
    if(!isset($_SESSION['user'])) header('location: index.php');
    // Include database connection
    include('connection.php');

    // Retrieve form data
    $EID = $_POST['EID'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $doj = $_POST['doj'];
    $basic_salary = $_POST['basic_salary'];
    $bonus = $_POST['bonus'];
    $allowance = $_POST['allowance'];
    $dept_name = $_POST['dept_name'];

    // Prepare SQL query
    $query = "INSERT INTO {$_POST['table']} (EID, fname, lname, DOB, phno, email, address, DOJ, salary, bonus, allowance, dname) 
              VALUES (:EID, :first_name, :last_name, :dob, :phno, :email, :address, :doj, :basic_salary, :bonus, :allowance, :dept_name)";
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':EID', $EID);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':phno', $phno);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':doj', $doj);
    $stmt->bindParam(':basic_salary', $basic_salary);
    $stmt->bindParam(':bonus', $bonus);
    $stmt->bindParam(':allowance', $allowance);
    $stmt->bindParam(':dept_name', $dept_name);

    // Execute the statement
    $stmt->execute();

    // Redirect to a success page or back to the form
    header('location: ../dashboard.php');
    exit();
?>