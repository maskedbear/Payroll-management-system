<?php
    session_start();
    if(!isset($_SESSION['user'])) header('location: index.php');

    $user = ($_SESSION['user']);
    
    include('database/connection.php');

    // Prepare and execute the SQL query to get the image path
    $query = 'SELECT image FROM users WHERE username=:username';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $user['username']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Construct the full image path
    $userImagePath = 'images/user/' . $result['image'];


    $query = 'SELECT * FROM employee';
    $stmt = $conn->query($query);
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ee47936f34.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Dashboard - Payroll Management System</title>
</head>
<body>
    <div class="dashboardmain">
        
        <?php include('partials/app-sidebar.php') ?>

        <div class="dashboardcontent_container" id="dashboardcontent_container">
            
        <?php include('partials/app-topnav.php') ?>

            <div class="dashboardcontent">
                <div class="dashboardcontent_main">





                <h2>Employee List</h2>
                    <table class="tablee">
                        <thead>
                            <tr>
                                <th>EID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>DOB</th>
                                <th>Phone No.</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Date of Joining</th>
                                <th>Basic Salary</th>
                                <th>Bonus</th>
                                <th>Allowance</th>
                                <th>Department Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $employee): ?>
                                <tr>
                                    <td><?php echo $employee['EID']; ?></td>
                                    <td><?php echo $employee['fname']; ?></td>
                                    <td><?php echo $employee['lname']; ?></td>
                                    <td><?php echo $employee['DOB']; ?></td>
                                    <td><?php echo $employee['phno']; ?></td>
                                    <td><?php echo $employee['email']; ?></td>
                                    <td><?php echo $employee['address']; ?></td>
                                    <td><?php echo $employee['DOJ']; ?></td>
                                    <td><?php echo $employee['salary']; ?></td>
                                    <td><?php echo $employee['bonus']; ?></td>
                                    <td><?php echo $employee['allowance']; ?></td>
                                    <td><?php echo $employee['dname']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>







                </div>
            </div>
        </div>
    </div>

   
    <script>
    function removeEmployee() {
        var confirmation = prompt("Enter Employee ID to confirm removal:");
        if (confirmation !== null && confirmation !== "") {
            window.location.href = 'remove.php?EID=' + confirmation;
        } else {
            alert("Incorrect Employee ID. Removal canceled.");
        }
    }
</script>


    <script src="js/script.js></script>

</body>
</html>