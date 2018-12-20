<?php session_start(); ?>
<?php require 'config.php'; ?>
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
<?php if($_SESSION['ADMIN']['id_guru'] == $hasil['id_guru']){ ?>
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
        <li><a href="#">Tambah Berita</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-plus white"></i><span class="break"></span>Tambah Berita Dan Informasi</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" method="POST" action="berita_proses_edit.php" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Judul </label>
                            <div class="controls">
                                <input type="text" class="span6" id="judul" name="judul" data-items="4" value="<?php echo $hasil['judul']; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Gambar</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="gambar" name="gambar" type="file">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput"></label>
                            <div class="controls">
                                <?php if(file_exists('assets/img/gallery/'.$hasil['gambar'])){ ?>
                                <img src="assets/img/gallery/<?php echo $hasil['gambar']; ?>" style="width: 200px;float: left; margin-right: 10px;" />
                                <?php }?>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">isi</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="isi" rows="3"><?php echo $hasil['isi']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id_guru" value="<?php echo $_SESSION['ADMIN']['id_guru']; ?>">
                            <input type="hidden" name="id_berita" value="<?php echo $hasil['id_berita']; ?>">
                            <button type="submit" class="btn btn-primary" name="proses">Update Berita</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div><!--/.fluid-container-->


<?php include 'nav-foot.php'; ?>
<?php include 'footer.php'; ?>

<?php include 'nav-foot.php'; ?>
<?php include 'footer.php'; ?>
<?php }else{?>
<script>window.location="berita.php";</script>
<?php }?>

