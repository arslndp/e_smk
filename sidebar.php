<div class="container-fluid-full">
    <div class="row-fluid">
        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
            <div class="nav-collapse sidebar-nav">
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <li><a href="index.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                    <?php if($_SESSION['ADMIN']){ ?>
                    <li>
                        <a>
                            <a class="dropmenu" href="#">
                                <i class="icon-book"></i>
                                <span class="hidden-tablet"> Berita</span>
                                <span class="label label-important"> 
                                    <i class="icon-angle-down"></i> 
                                </span>
                            </a>
                        <ul>
                            <li>
                                <a class="submenu" href="berita_new.php">
                                    <i class="icon-plus"></i>
                                    <span class="hidden-tablet"> 
                                        Tambah Berita</span>
                                </a>
                            </li>
                            <li>
                                <a class="submenu" href="berita.php">
                                    <i class="icon-info-sign"></i>
                                    <span class="hidden-tablet"> 
                                        Daftar Berita</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropmenu" href="#">
                            <i class="icon-user"></i>
                            <span class="hidden-tablet"> Guru</span>
                            <span class="label label-important"> 
                                <i class="icon-angle-down"></i> 
                            </span>
                        </a>
                        <ul>
                            <li>
                                <a class="submenu" href="guru.php">
                                    <i class="icon-file-alt"></i>
                                    <span class="hidden-tablet"> Data Guru</span>
                                </a>
                            </li>
                            <?php if($_SESSION['ADMIN']['id_login'] == 1){ ?>
                            <li>
                                <a class="submenu" href="guru_new.php">
                                    <i class="icon-plus"></i>
                                    <span class="hidden-tablet"> Tambah Guru</span>
                                </a>
                            </li>
                            <?php }?>
                        </ul>	
                    </li>
                    <li>
                        <a class="dropmenu" href="#">
                            <i class="icon-user"></i>
                            <span class="hidden-tablet"> Siswa</span>
                            <span class="label label-important"> 
                                <i class="icon-angle-down"></i> 
                            </span>
                        </a>
                        <ul>
                            <li>
                                <a class="submenu" href="siswa.php">
                                    <i class="icon-file-alt"></i>
                                    <span class="hidden-tablet"> Data Siswa</span>
                                </a>
                            </li>
                            <?php if($_SESSION['ADMIN']['id_login'] == 1){ ?>
                            <li>
                                <a class="submenu" href="siswa_new.php">
                                    <i class="icon-plus"></i>
                                    <span class="hidden-tablet"> Tambah Siswa</span>
                                </a>
                            </li>
                            <?php }?>
                            <li>
                                <a class="submenu" href="absensi.php">
                                    <i class="icon-file-alt"></i>
                                    <span class="hidden-tablet"> Absensi</span>
                                </a>
                            </li>
                        </ul>	
                    </li>
                    <?php }else{?>
                    <li><a href="berita.php"><i class="icon-book"></i><span class="hidden-tablet"> Berita dan Info</span></a></li>
                    <li>
                                <a class="submenu" href="absensi.php">
                                    <i class="icon-file-alt"></i>
                                    <span class="hidden-tablet"> Absensi</span>
                                </a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- end: Main Menu -->
			