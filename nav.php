<!-- start: Header -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.php"><span>e-SMK <small style="font-size: 16px;">(Sistem Manajemen Kehadiran)</small></span></a>
            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    <?php if($_SESSION['ADMIN']){ ?>
                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white user"></i> <?php echo $_SESSION['ADMIN']['nm_guru']; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-title">
                                <span>Account Settings</span>
                            </li>
                            <li><a href="user_read.php"><i class="halflings-icon user"></i> Profile</a></li>
                            <li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- end: User Dropdown -->
                    <?php }else{?>
                    <li><a class="brand" href="login.php"><span style="font-size: 14px;padding-left: 15px;"> <i class="icon-lock"></i> Log In</span></a></li>
                    <?php }?>
                </ul>
            </div>
            <!-- end: Header Menu -->
        </div>
    </div>
</div>
<!-- start: Header -->

