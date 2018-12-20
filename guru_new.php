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
        <li><a href="#">Tambah Guru</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user white"></i><span class="break"></span>Tambah Guru</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" method="POST" action="guru_proses.php" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">NIP </label>
                            <div class="controls">
                                <input type="text" class="span6" id="nip" name="nip" data-items="4" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Nama </label>
                            <div class="controls">
                                <input type="text" class="span6" id="nm_guru" name="nm_guru" data-items="4" required="required"/>
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
                                <input class="input-file uniform_on" id="foto" name="foto" type="file">
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id_guru" value="<?php echo $_SESSION['ADMIN']['id_guru']; ?>">
                            <button type="submit" class="btn btn-primary" name="proses">Tambah Guru</button>
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
<script>window.location="guru.php";</script>
<?php }?>

