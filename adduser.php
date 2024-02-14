<?php
    session_start();
    if(!isset($_SESSION['user'])) header('location: index.php');
    $_SESSION['table'] = 'employee';
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
                    <form action="database/add.php" method="POST" class="appForm">

                        <h1 class="head">Personal Details</h1>
                        
                        <div>
                            <label for="EID">EID</label>
                            <input type="number" class="appFormInput" id="EID" name="EID" />
                        </div>
                        <div>
                            <label for="first_name">First Name</label>
                            <input type="text" class="appFormInput" id="first_name" name="first_name" />
                        </div>
                        <div>
                            <label for="last_name">Last Name</label>
                            <input type="text" class="appFormInput" id="last_name" name="last_name" />
                        </div>
                        <div>
                            <label for="dob">D.O.B</label>
                            <input type="date" class="appFormInput" id="dob" name="dob" />
                        </div>
                        <div>
                            <label for="phno">Phone No.</label>
                            <input type="number" class="appFormInput" id="phno" name="phno" />
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" class="appFormInput" id="email" name="email" />
                        </div>
                        <div>
                            <label for="address">Address</label>
                            <input type="text" class="appFormInput" id="address" name="address" />
                        </div>
                        <div>
                            <label for="doj">Date of joining</label>
                            <input type="date" class="appFormInput" id="doj" name="doj" />
                        </div>

                        <h1 class="head">Salary</h1>

                        <div>
                            <label for="basic_salary">Basic Salary</label>
                            <input type="number" class="appFormInput" id="basic_salary" name="basic_salary" />
                        </div>
                        <div>
                            <label for="bonus">Bonus</label>
                            <input type="number" class="appFormInput" id="bonus" name="bonus" />
                        </div>
                        <div>
                            <label for="allowance">Allowance</label>
                            <input type="number" class="appFormInput" id="allowance" name="allowance" />
                        </div>

                        <h1 class="head">Department</h1>

                        <div>
                            <label for="dept_name">Department Name</label>
                            <input type="datalist" class="appFormInput" id="dept_name" name="dept_name" />
                        </div>
                        <input type="hidden" name="table" value="employee" />
                        <button type="submit" class="appbtn"><i class="fa fa-plus"></i>Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>

</body>
</html>