<div class="dashboardsidebar" id="dashboardsidebar">
            <h3 class="sidebartitle" id="sidebartitle">PMS</h3>
            <div class="sidebaruser">
                <img src="<?= $userImagePath ?>" alt="User image" id="userimg"/>
                <span id="username"><?= $user['username'] ?></span>
            </div>
            <div class="sidebarmenus">
                <ul class="dashboardmenulists">
                    <!-- <li class="menuactive" >
                        <a href="dashboard.php"><i class="fa fa-house"></i><span class="menutext">  Home Page</span></a>
                    </li> -->
                    <li class="menuactive">
                        <a href="dashboard.php"><i class="fa fa-circle-info"></i><span class="menutext"> Personal details</span></a>
                    </li>
                    <!-- <li class="menuactive">
                        <a href="dashboard.php"><i class="fa fa-money-bill"></i><span class="menutext"> Salary</span></a>
                    </li>
                    <li class="menuactive">
                        <a href="dashboard.php"><i class="fa fa-building"></i><span class="menutext"> Department</span></a>
                    </li> -->
                    <li class="menuactive">
                        <a href="adduser.php"><i class="fa fa-user-plus"></i><span class="menutext"> Add Employee</span></a>
                    </li>
                    <li class="menuactive">
                        <a href="" onclick="removeEmployee()"><i class="fa-solid fa-xmark"></i><span class="menutext"> Remove Employee</span></a>
                    </li>
                </ul>
            </div>
</div>