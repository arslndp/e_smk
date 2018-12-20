<?php session_start(); ?>
<?php if($_SESSION['ADMIN']['id_login'] == 1){ ?>
<?php require 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
$id = $_GET['id'];
$sql = 'SELECT t_kelas.nm_kelas,t_siswa.* 
        FROM t_siswa 
        INNER JOIN t_kelas ON t_siswa.id_kelas = t_kelas.id_kelas
        WHERE t_siswa.id_siswa = ?';
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
        <li><a href="#">Ubah Data Siswa</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user white"></i><span class="break"></span>Ubah Data Siswa</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" method="POST" action="siswa_proses_edit.php" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">NIS </label>
                            <div class="controls">
                                <input type="text" class="span6" id="nip" name="nis" data-items="4" value="<?php echo $hasil['nis']; ?>" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Nama </label>
                            <div class="controls">
                                <input type="text" class="span6" id="nm_siswa" name="nm_siswa" value="<?php echo $hasil['nm_siswa']; ?>" data-items="4" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Kelas</label>
                            <div class="controls">
                                <select id="selectError3" name="id_kelas" required="required">
                                    <option value="">Pilih Kelas</option>
                                    <?php
                                    $sql_k = 'SELECT * FROM t_kelas';
                                    $row_k = $config -> prepare($sql_k);
                                    $row_k -> execute();
                                    $hasil_k = $row_k -> fetchAll();
                                    foreach($hasil_k as $isi){
                                        if($isi['id_kelas'] == $hasil['id_kelas']){
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                    ?>
                                    <option value="<?php echo $isi['id_kelas'] ?>" <?php echo $selected; ?>><?php echo $isi['nm_kelas']; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Tahun Masuk </label>
                            <div class="controls">
                                <input type="text" class="span6" id="thn_masuk" name="thn_masuk" value="<?php echo $hasil['thn_masuk']; ?>" data-items="4" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Tahun Keluar </label>
                            <div class="controls">
                                <input type="text" class="span6" id="thn_keluar" name="thn_keluar" value="<?php echo $hasil['thn_keluar']; ?>" data-items="4" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Alamat </label>
                            <div class="controls">
                                <textarea  name="alamat" rows="3" class="span6" required="required"> <?php echo $hasil['alamat']; ?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Email </label>
                            <div class="controls">
                                <input type="email" class="span6" id="email" name="email" value="<?php echo $hasil['email']; ?>" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Telpon </label>
                            <div class="controls">
                                <input type="number" class="span6" id="tlp" name="tlp" value="<?php echo $hasil['tlp']; ?>" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Foto</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="foto" name="foto" type="file" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput"></label>
                            <div class="controls">
                                <?php if(file_exists('assets/img/siswa/'.$hasil['foto'])){ ?>
                                <img src="assets/img/siswa/<?php echo $hasil['foto']; ?>" style="width: 200px;float: left; margin-right: 10px;" />
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id_guru" value="<?php echo $_SESSION['ADMIN']['id_guru']; ?>">
                            <input type="hidden" name="id_siswa" value="<?php echo $hasil['id_siswa']; ?>">
                            <button type="submit" class="btn btn-primary" name="proses">Ubah ssiwa</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div><!--/.fluid-container-->

<?php include 'nav-foot.php'; ?>
<?php include 'footer.php'; ?>
<?php }else{?>
<script>window.location="siswa.php";</script>
<?php } ?>


