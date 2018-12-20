<?php session_start(); ?>
<?php require 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.php">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Guru</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user white"></i><span class="break"></span>Daftar Guru</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Tlp</th>
                            <?php if($_SESSION['ADMIN']['id_login'] == 1){ ?>
                            <th>Aksi</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'SELECT * FROM t_guru ORDER BY id_guru DESC';
                        $row = $config -> prepare($sql);
                        $row -> execute();
                        $hasil = $row -> fetchAll();
                        
                        $no = 1;
                        foreach($hasil as $isi){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><a href="berita_read.php?id=<?php echo $isi['id_berita']; ?>"><?php echo $isi['judul']; ?></a></td>
                            <td><?php echo $isi['nm_guru']; ?></td>
                            <td><?php echo $isi['alamat']; ?></td>
                            <td><?php echo $isi['email']; ?></td>
                            <td><?php echo $isi['tlp']; ?></td>
                            <?php if($_SESSION['ADMIN']['id_login'] == 1){ ?>
                            <td><a href="guru_edit.php?id=<?php echo $isi['id_guru']; ?>"><i class="icon-pencil"></i></a></td>
                            <?php }?>
                        </tr>
                        <?php $no++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!--/.fluid-container-->

<?php include 'nav-foot.php'; ?>
<?php include 'footer.php'; ?>


