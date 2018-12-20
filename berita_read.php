<?php session_start(); ?>
<?php require 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
$id = $_GET['id'];
$sql = 'SELECT 
    t_guru.nm_guru,
    t_berita.*
    FROM t_berita INNER JOIN t_guru
    ON t_berita.id_guru=t_guru.id_guru
    WHERE id_berita = ?';
$row = $config -> prepare($sql);
$row -> execute(array($id));
$hasil = $row -> fetch();
?>
<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.php">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#"><?php echo $hasil['judul']; ?></a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span9">
            <div class="box-header">
                <h2>
                    <i class="halflings-icon align-justify white font"></i>
                    <span class="break"></span>
                        <?php echo $hasil['judul']; ?>
                </h2>
            </div>
            <div class="box-content">
                <div class="page-header">
                    <h1><?php echo $hasil['judul']; ?></h1>
                    <p class="help-block"><i class="halflings-icon calendar"></i> <?php echo $hasil['tgl_input']; ?>, <i class="halflings-icon user"></i> <?php echo $hasil['nm_guru']; ?></p>
                    <?php if(file_exists('assets/img/gallery/'.$hasil['gambar'])){ ?>
                    <img src="assets/img/gallery/<?php echo $hasil['gambar']; ?>" style="width: 200px;float: left; margin-right: 10px;" />
                    <?php }?>
                    <?php echo $hasil['isi']; ?>
                </div>
            </div>
        </div>
        <div class="box span3">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white list"></i><span class="break"></span>Berita Terbaru</h2>
            </div>
            <div class="box-content">
                <ol>
                    <?php
                        $sql = 'SELECT 
                                t_guru.nm_guru,
                                t_berita.*
                                FROM t_berita INNER JOIN t_guru
                                ON t_berita.id_guru=t_guru.id_guru
                                ORDER BY id_berita DESC';
                        $row = $config -> prepare($sql);
                        $row -> execute();
                        $hasil = $row -> fetchAll();
                        
                        $no = 1;
                        foreach($hasil as $isi){
                            if($no <= 5){
                        ?>
                    <li><a href="berita_read.php?id=<?php echo $isi['id_berita']; ?>"><?php echo $isi['judul']; ?></a></li>
                            <?php }}?>
                </ol>
            </div>
        </div>
    </div>
</div><!--/.fluid-container-->

<?php include 'nav-foot.php'; ?>
<?php include 'footer.php'; ?>


