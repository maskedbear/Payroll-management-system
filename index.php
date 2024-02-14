<?php
    session_start();
    if(isset($_SESSION["user"])) header("location: dashboard.php");
    $error_message = '';


    if($_POST){
        include('database/connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $query = 'SELECT * FROM users where users.username="'.$username.'" AND users.password="'.$password.'"';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        

        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user'] = $user;
            header('Location: dashboard.php');
        }else $error_message = 'please make sure that username and password are correct';

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Payroll Management System</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="loginbody">
    <!-- <div>
        <p>Error: <?=$error_message?> </p>
    </div> -->
    <div class="container">
        <div class="loginheader">
            <!-- <h1>Payroll Management System</h1> -->
        </div>
        <div class="loginbody">
            <form action="index.php" method="POST">
                <h2>Payroll Management System</h2>
                <div class="logininputcontainer">
                    <label for="">Username</label>
                    <input placeholder="Example : Walter" name="username" type="text" />
                </div>
                <div class="logininputcontainer">
                    <label for="">Password</label>
                    <input placeholder="********" name="password" type="password" />
                </div>
                <?php if(!empty($error_message)){ ?>
                    <div class="errormsg">
                        <p>Error: <?=$error_message?> </p>
                    </div>
                <?php } ?>    
                <div class="loginbutton">
                    <button >login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>