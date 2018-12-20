<?php session_start(); ?>
<?php if($_SESSION['ADMIN']['id_login'] == 1){ ?>
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
        <li><a href="#">Tambah Siswa</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user white"></i><span class="break"></span>Tambah Siswa</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" method="POST" action="siswa_proses.php" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">NIS </label>
                            <div class="controls">
                                <input type="text" class="span6" id="nip" name="nis" data-items="4" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Nama </label>
                            <div class="controls">
                                <input type="text" class="span6" id="nm_siswa" name="nm_siswa" data-items="4" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Kelas</label>
                            <div class="controls">
                                <select id="selectError3" name="id_kelas" required="required">
                                    <option>Pilih Kelas</option>
                                    <?php
                                    $sql = 'SELECT * FROM t_kelas';
                                    $row = $config -> prepare($sql);
                                    $row -> execute();
                                    $hasil = $row -> fetchAll();
                                    foreach($hasil as $isi){
                                    ?>
                                    <option value="<?php echo $isi['id_kelas'] ?>"><?php echo $isi['nm_kelas']; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Tahun Masuk </label>
                            <div class="controls">
                                <input type="text" class="span6" id="thn_masuk" name="thn_masuk" data-items="4" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Tahun Keluar </label>
                            <div class="controls">
                                <input type="text" class="span6" id="thn_keluar" name="thn_keluar" data-items="4" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Alamat </label>
                            <div class="controls">
                                <textarea  name="alamat" rows="3" class="span6" required="required"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Email </label>
                            <div class="controls">
                                <input type="email" class="span6" id="email" name="email" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Telpon </label>
                            <div class="controls">
                                <input type="number" class="span6" id="tlp" name="tlp" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Foto</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="foto" name="foto" type="file" required="required">
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id_guru" value="<?php echo $_SESSION['ADMIN']['id_guru']; ?>">
                            <button type="submit" class="btn btn-primary" name="proses">Tambah Siswa</button>
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


