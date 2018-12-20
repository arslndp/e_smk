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
        <li><a href="#">Dashboard</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-info-sign white signal"></i><span class="break"></span>Berita Dan Informasi</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <?php if($_SESSION['ADMIN']){ ?>
                            <th>Aksi</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'SELECT 
                                t_guru.nm_guru,
                                t_berita.*
                                FROM t_berita INNER JOIN t_guru
                                ON t_berita.id_guru=t_guru.id_guru';
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
                            <td><?php echo $isi['tgl_input']; ?></td>
                            <?php if($_SESSION['ADMIN']){ ?>
                            <td>
                                <?php if($_SESSION['ADMIN']['id_guru'] == $isi['id_guru']){ ?>
                                <a href="berita_edit.php?id=<?php echo $isi['id_berita']; ?>"><i class="icon-pencil"></i></a>
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


