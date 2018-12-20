<?php session_start(); ?>
<?php if($_SESSION['ADMIN']){ ?>
<?php require 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
$id = $_GET['id'];
$sql = 'SELECT * FROM t_guru WHERE id_guru = ?';
$row = $config -> prepare($sql);
$row -> execute(array($id));
$jumRow = $row -> rowCount();
if($jumRow > 0){
$hasil = $row -> fetch();

$id_guru = $hasil['id_guru'];
$sql_l = 'SELECT * FROM t_login WHERE id_guru = ?';
$row_l = $config -> prepare($sql_l);
$row_l -> execute(array($id_guru));
$jumRow_l = $row_l -> rowCount();
$user = $row_l -> fetch();
?>
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
                <h2><i class="halflings-icon user white"></i><span class="break"></span>Kelola User</h2>
                
            </div>
            <div class="box-content">
                <?php if($jumRow_l > 0 && $_SESSION['ADMIN']['id_login'] == $user['id_login'] || $_SESSION['ADMIN']['id_login'] == 1){ ?>
                <form class="form-horizontal" method="POST" action="user_proses_edit.php">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Username </label>
                            <div class="controls">
                                <input type="text" class="span6" id="u_login" name="u_login" data-items="4" value="<?php echo $user['u_login']; ?>" readonly="readonly"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Password Lama</label>
                            <div class="controls">
                                <input type="password" class="span6" id="password" name="password" data-items="4" value="" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Password Baru</label>
                            <div class="controls">
                                <input type="password" class="span6" id="p_login" name="p_login" data-items="4" value="" required="required"/>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id_login" value="<?php echo $user['id_login']; ?>">
                            <button type="submit" class="btn btn-primary" name="proses">Ubah Password</button>
                        </div>
                    </fieldset>
                </form>
                <?php }else{?>
                <form class="form-horizontal" method="POST" action="user_proses.php" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Username </label>
                            <div class="controls">
                                <input type="text" class="span6" id="u_login" name="u_login" data-items="4" value="" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Password </label>
                            <div class="controls">
                                <input type="password" class="span6" id="p_login" name="p_login" data-items="4" value="" required="required"/>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id_guru" value="<?php echo $hasil['id_guru']; ?>">
                            <button type="submit" class="btn btn-primary" name="proses">Tambah User</button>
                        </div>
                    </fieldset>
                </form>
                <?php }?>
            </div>
        </div>
    </div>
</div><!--/.fluid-container-->
<?php } else {
echo '<script>window.location="guru.php";</script>';
}?>
<?php include 'nav-foot.php'; ?>
<?php include 'footer.php'; ?>

<?php }else{?>
<script>window.location="guru.php";</script>
<?php }?>

