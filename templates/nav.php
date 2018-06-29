<?php
require_once 'core/init.php';

$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to(404);
}

?>
<nav class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                        </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $user->data()->name; ?></strong>
                        </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
                IN+
            </div>
        </li>

        <li>
            <a href="home.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
        </li>
        <li class="active">
            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">HCL Forms</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="active"><a href="form.php">Entry Form</a></li>
                <li><a href="view_hlc.php">View Data</a></li>
                <li><a href="extract_data.php">Extract Data</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="upload_report.php">Upload</a></li>
                <li><a href="#">View</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Profile</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="#">Settings</a></li>
                <li><a href="#">View</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="#">Register</a></li>
                <li><a href="#">View</a></li>
            </ul>
        </li>
    </ul>

</div>
</nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">WELCOME TO THE HLC STATUS ASSESSMENT PORTAL.</span>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>