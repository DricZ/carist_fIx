
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<div class="sidebar-brand d-flex align-items-center justify-content-center">
    <a href="dashboard.php"><div class="sidebar-brand-icon">
        <img src="./img/carist only cropped.png" style="height: 50px;">
    </div></a>
    <a href="dashboard.php" style="text-decoration: none; color: white;"><div class="sidebar-brand-text mx-3">Carist</div></a>
    
</div>

<!-- Divider -->
<hr class="sidebar-divider my-0">
 
<?php
    // echo "Admin" . $adminAccess;
    // echo "Head" . $headAccess;
    // echo "Marketing" . $marketingAccess;
?>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
        <img src="./img/logo/Dashboard.png" style="height: 20px;">
        <span>Dashboard</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="calendar.php">
        <img src="./img/logo/Calender.png" style="height: 20px;">
        <span>Calendar</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- ADMIN/HEAD PAGE -->
<?php
    if($adminAccess || $headAccess){
?>
<!-- Heading -->
<div class="sidebar-heading">
    Head
</div> 

<!-- <li class="nav-item active">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-user"></i>
        <span>Design Staff Review</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-user"></i>
        <span>Menu Design</span>
    </a>
</li> -->

<!-- Nav Item - New Client -->
<li class="nav-item active">
    <a class="nav-link" href="new_client.php">
        <i class="fas fa-fw fa-plus"></i>
        <span>New Client</span></a>
</li>

<!-- Nav Item - Client List -->
<li class="nav-item active">
    <a class="nav-link" href="client_list.php">
    <img src="./img/logo/Staff.png" style="height: 20px;">
        <span>Client List</span></a>
</li>

<!-- Nav Item - Approve User -->
<li class="nav-item active">
    <a class="nav-link" href="user_list.php">
        <img src="./img/logo/Staff.png" style="height: 20px;">
        <span>User List</span></a>
</li>

<!-- <li class="nav-item active">
    <a class="nav-link">
        <i class="fas fa-fw fa-user"></i>
        <span>Laporan Keuangan</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link">
        <i class="fas fa-fw fa-user"></i>
        <span>Staff Report</span>
    </a>
</li> -->


<!-- Divider -->
<hr class="sidebar-divider">

<?php
    }//Admin or Head End
?>

<!-- MANAGER OPERASIONAL -->
<?php
    if($operationalAccess || $adminAccess){
?>
<!-- Heading -->
<div class="sidebar-heading">
    Manager Operational
</div>

<!-- Nav Item - Review Task -->
<li class="nav-item active">
    <a class="nav-link" href="review_task.php">
        <i class="fas fa-fw fa-check"></i>
        <span>Review Task</span></a>
</li>


<!-- DESIGN -->
<!-- Divider -->
<hr class="sidebar-divider">

<?php
    }//Operational End
?>

<?php
    if($contentwriterAccess || $designerAccess || $copywriterAccess || $adminAccess || $marketingAccess){
?>

<!-- Heading -->
<div class="sidebar-heading">
    <?php
        if($designerAccess){
    ?>
            Designer
    <?php
        }
        else if($contentwriterAccess){
    ?>
            Content Writer

    <?php
        }
        else if($copywriterAccess){
    ?>
            Copy Writer

    <?php
        }
        else if($adminAccess){
    ?>
            Admin

    <?php
        }
        else if($marketingAccess){
    ?>
            Marketing

    <?php
        }
        
    ?>

</div>

<!-- Nav Item - My Task -->
<li class="nav-item active">
    <a class="nav-link" href="my_task.php">
        <img src="./img/logo/Task.png" style="height: 20px;">
        <span>My Task</span></a>
</li>

<?php
    if($marketingAccess || $adminAccess || $headAccess){
?>
    <!-- <li class="nav-item active">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Financial Report</span>
    </a>
    </li> -->

    <!-- Potential Client -->
    <li class="nav-item active">
        <a class="nav-link" href="potential_client.php">
            <img src="./img/logo/Marketing.png" style="height: 20px;">
            <span>Potential Client</span>
        </a>
    </li>

<?php
    }
?>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<?php
    }//User
?>

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li> -->

<!-- Nav Item - Utilities Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Addons
</div> -->

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="index.php">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li> -->

<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li> -->

<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li> -->

<!-- Sidebar Toggler (Sidebar) -->
<!-- <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> -->

<!-- Sidebar Message -->
<!-- <div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> -->

</ul>
<!-- End of Sidebar -->