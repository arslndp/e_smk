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
        <li><a href="#">Siswa</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user white"></i><span class="break"></span>Daftar Siswa</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <?php if($_SESSION['ADMIN']){ ?>
                            <th>Aksi</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'SELECT 
                                t_siswa.*,
                                t_kelas.nm_kelas
                                FROM t_siswa
                                INNER JOIN t_kelas ON t_kelas.id_kelas = t_siswa.id_kelas
                                ORDER BY id_siswa DESC';
                        $row = $config -> prepare($sql);
                        $row -> execute();
                        $hasil = $row -> fetchAll();
                        
                        $no = 1;
                        foreach($hasil as $isi){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $isi['nis']; ?></td>
                            <td><!--<a href="siswa_read.php?id=<?php echo $isi['id_siswa']; ?>">--><?php echo $isi['nm_siswa']; ?><!--</a>--></td>
                            <td><?php echo $isi['nm_kelas']; ?></td>
                            <td><?php echo $isi['thn_masuk']; ?></td>
                            <td><?php echo $isi['thn_keluar']; ?></td>
                            <td>
                                <?php if($_SESSION['ADMIN']['id_login'] == 1){ ?>
                                <a class="btn btn-warning" href="siswa_edit.php?id=<?php echo $isi['id_siswa']; ?>"><i class="icon-pencil"></i> Edit</a>
                                <?php }?>
                                <a class="btn btn-success" href="absensi_new.php?id=<?php echo $isi['id_siswa']; ?>"><i class="halflings-icon ok"></i> Absen</a>
                            </td>
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


