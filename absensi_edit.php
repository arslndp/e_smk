<?php session_start(); ?>
<?php if($_SESSION['ADMIN']){ ?>
<?php require 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
$id = $_GET['id'];
$sql = 'SELECT 
    t_absensi.*,
    t_siswa.nis,
    t_siswa.nm_siswa,
    t_status.nm_status,
    t_guru.nm_guru
    FROM t_absensi 
    LEFT JOIN t_siswa ON t_siswa.id_siswa = t_absensi.id_siswa
    LEFT JOIN t_status ON t_status.id_status = t_absensi.id_status
    LEFT JOIN t_guru ON t_guru.id_guru = t_absensi.id_guru
    WHERE id_absensi = ?';
$row = $config -> prepare($sql);
$row -> execute(array($id));
$jumRow = $row -> rowCount();
if($jumRow > 0){
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
        <li><a href="#">Tambah Absensi</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user white"></i><span class="break"></span><?php echo $hasil['nm_siswa']; ?></h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" method="POST" action="absensi_proses.php" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Status</label>
                            <div class="controls">
                                <select id="selectError3" name="id_status" required="required">
                                    <option>Pilih Status</option>
                                    <?php
                                    $sql_s = 'SELECT * FROM t_status';
                                    $row_s = $config -> prepare($sql_s);
                                    $row_s -> execute();
                                    $hasil_s = $row_s -> fetchAll();
                                    foreach($hasil_s as $isi){
                                        if($isi['id_status'] == $hasil['id_status']){
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                    ?>
                                    <option value="<?php echo $isi['id_status'] ?>" <?php echo $selected; ?>><?php echo $isi['nm_status']; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Keterangan </label>
                            <div class="controls">
                                <textarea name="keterangan" rows="3" class="span6" required="required"><?php echo $hasil['keterangan']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id_siswa" value="<?php echo $hasil['id_siswa']; ?>">
                            <input type="hidden" name="id_absensi" value="<?php echo $hasil['id_absensi']; ?>">
                            <input type="hidden" name="id_guru" value="<?php echo $_SESSION['ADMIN']['id_guru']; ?>">
                            <input type="submit" class="btn btn-primary" name="proses" value="Ubah Absen">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div><!--/.fluid-container-->
<?php } else{ ?>
<script>window.location="siswa.php";</script>
<?php }?>
<?php include 'nav-foot.php'; ?>
<?php include 'footer.php'; ?>
<?php }else{?>
<script>window.location="siswa.php";</script>
<?php }?>

