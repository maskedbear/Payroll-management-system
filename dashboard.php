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
        <div class="dashboardsidebar" id="dashboardsidebar">
            <h3 class="sidebartitle" id="sidebartitle">PMS</h3>
            <div class="sidebaruser">
                <img src="<?= $userImagePath ?>" alt="User image" id="userimg"/>
                <span id="username"><?= $user['username'] ?></span>
            </div>
            <div class="sidebarmenus">
                <ul class="dashboardmenulists">
                    <li class="menuactive" >
                        <a href=""><i class="fa fa-house"></i><span class="menutext">  Home Page</span></a>
                    </li>
                    <li class="menuactive">
                        <a href=""><i class="fa fa-circle-info"></i><span class="menutext"> Personal details</span></a>
                    </li>
                    <li class="menuactive">
                        <a href=""><i class="fa fa-money-bill"></i><span class="menutext"> Salary</span></a>
                    </li>
                    <li class="menuactive">
                        <a href=""><i class="fa fa-building"></i><span class="menutext"> Department</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dashboardcontent_container" id="dashboardcontent_container">
            <div class="dashboard_topnav">
                <a href="" id="togglebtn"><i class="fa fa-bars fa-lg"></i></a>
                <a href="database/logout.php" class="logoutbtn"><i class="fa fa-power-off"> Log Out</i></a>
            </div>
            <div class="dashboardcontent">
                <div class="dashboardcontent_main">

                </div>
            </div>
        </div>
    </div>
    <script>
        var sideBarIsOpen =true;

        togglebtn.addEventListener( 'click', (event) =>  {
            event.preventDefault();

            if(sideBarIsOpen){
                dashboardsidebar.style.width = '3%';
                dashboardsidebar.style.transition = '0.5s all';
                username.style.display = 'none'
                dashboardcontent_container.style.width = '97%';
                sidebartitle.style.fontSize = '20px';
                userimg.style.width='30px';
                userimg.style.position = 'static';
            
                menutext = document.getElementsByClassName('menutext');
                for(var i=0; i < menutext.length;i++){
                    menutext[i].style.display = 'none';
                }

                var menuactiveItems = document.querySelectorAll('.menuactive');
                for (var i = 0; i < menuactiveItems.length; i++) {
                    menuactiveItems[i].style.paddingLeft = '20px';
                }
                sideBarIsOpen= false;
            }
            else{
                dashboardsidebar.style.width = '15%';
                username.style.display = 'block';
                username.style.position = 'relative';
                username.style.left = '50px';
                username.style.bottom = '36px';
                dashboardcontent_container.style.width = '85%';
                sidebartitle.style.fontSize = '40px';
                userimg.style.width='50px';
                userimg.style.position = 'relative';
                userimg.style.right = '20px';
            
                menutext = document.getElementsByClassName('menutext');
                for(var i=0; i < menutext.length;i++){
                    menutext[i].style.display = 'inline-block';
                }

                var menuactiveItems = document.querySelectorAll('.menuactive');
                for (var i = 0; i < menuactiveItems.length; i++) {
                    menuactiveItems[i].style.paddingLeft = '20px';
                }
                sideBarIsOpen = true;
            }
        });
    </script>
</body>
</html>