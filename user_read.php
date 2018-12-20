<?php session_start(); ?>
<?php require 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
$id = $_SESSION['ADMIN']['id_guru'];
$sql = 'SELECT * FROM t_guru WHERE id_guru = ?';
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
        <div class="box span3">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user white"></i><span class="break"></span>Foto</h2>
            </div>
            <div class="box-content">
                <div class="control-group">
                            <label class="control-label" for="fileInput"></label>
                            <div class="controls">
                                <?php if(file_exists('assets/img/guru/'.$hasil['foto']) && !empty($hasil['foto'])){ ?>
                                <img src="assets/img/guru/<?php echo $hasil['foto']; ?>" style="width: 100%;" />
                                <?php }else{?>
                                <img src="assets/img/noImg.png" style="width: 100%;" />
                                <?php }?>
                            </div>
                        </div>
            </div>
        </div>
        <div class="box span9">
            <div class="box-header">
                <h2>
                    <i class="halflings-icon pencil white"></i>
                    <span class="break"></span>
                        Detail Informasi
                </h2><div class="box-icon">
                    <a href="user_edit.php?id=<?php echo $hasil['id_guru']; ?>"><i class="halflings-icon plus-sign"></i> <span style="color: white">User</span></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" method="POST" action="guru_proses_edit.php" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">NIP </label>
                            <div class="controls">
                                <input type="text" class="span6" id="nip" name="nip" data-items="4" value="<?php echo $hasil['nip']; ?>" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Nama </label>
                            <div class="controls">
                                <input type="text" class="span6" id="nm_guru" name="nm_guru" data-items="4" value="<?php echo $hasil['nm_guru']; ?>" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Alamat </label>
                            <div class="controls">
                                <textarea  name="alamat" rows="3" class="span6" required="required"><?php echo $hasil['alamat']; ?></textarea>
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
                                <input class="input-file uniform_on" id="foto" name="foto" type="file">
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id_guru" value="<?php echo $_SESSION['ADMIN']['id_guru']; ?>">
                            <input type="hidden" name="id_edit" value="<?php echo $hasil['id_guru']; ?>">
                            <button type="submit" class="btn btn-primary" name="proses">Ubah Guru</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div><!--/.fluid-container-->

<?php include 'nav-foot.php'; ?>
<?php include 'footer.php'; ?>


