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
        <li><a href="#">Absensi</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon ok white"></i><span class="break"></span>List Ketidak hadiran Siswa</h2>
                <div class="box-icon"><?php if($_SESSION['ADMIN']){ ?>
                            
                            
                    <a href="siswa.php" style="color: white"><i class="halflings-icon plus white"></i> Tambah Absen</a>
                    <?php }?>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Guru</th>
                            <?php if($_SESSION['ADMIN']){ ?>
                            <th>Aksi</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'SELECT 
                                t_absensi.*,
                                t_siswa.nis,
                                t_siswa.nm_siswa,
                                t_status.nm_status,
                                t_guru.nm_guru
                                FROM t_absensi 
                                LEFT JOIN t_siswa ON t_siswa.id_siswa = t_absensi.id_siswa
                                LEFT JOIN t_status ON t_status.id_status = t_absensi.id_status
                                LEFT JOIN t_guru ON t_guru.id_guru = t_absensi.id_guru';
                        $row = $config -> prepare($sql);
                        $row -> execute();
                        $hasil = $row -> fetchAll();
                        
                        $no = 1;
                        foreach($hasil as $isi){
                        ?>
                        <tr>
                            <td><?php echo $isi['tgl_absen']; ?></td>
                            <td><?php echo $isi['nis']; ?></td>
                            <td><?php echo $isi['nm_siswa']; ?></td>
                            <td><?php echo $isi['nm_status']; ?></td>
                            <td><?php echo $isi['keterangan']; ?></td>
                            <td><?php echo $isi['nm_guru']; ?></td>
                            <?php if($_SESSION['ADMIN']){ ?>
                            <td>
                                <?php if($_SESSION['ADMIN']['id_guru'] == $isi['id_guru']){ ?>
                                <a href="absensi_edit.php?id=<?php echo $isi['id_absensi']; ?>"><i class="icon-pencil"></i></a>
                                <?php }?>
                            </td>
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