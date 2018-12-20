<?php session_start(); ?>
<?php include 'header.php'; ?>
<?php
if($_POST){
    require 'config.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    $data[] = $username;
    $data[] = $password;
   
    $sql = 'SELECT 
          t_login.u_login, 
          t_login.p_login, 
          t_login.id_login,
          t_login.tgl_daftar,
          t_guru.*
          FROM t_login
          INNER JOIN t_guru ON t_guru.id_guru = t_login.id_guru
          WHERE u_login = ? AND p_login = MD5(?)';
   
    $row = $config -> prepare($sql);
    $row -> execute($data);
    
    $jumRow = $row -> rowCount();
    
    if($jumRow > 0){
        $hasil = $row -> fetch();
        $_SESSION['ADMIN'] = $hasil;
    }
    else{
        echo '<script>alert("Login Gagal");</script>';
    }
}
?>
<?php if($_SESSION['ADMIN']){ ?>
<script>window.location="index.php";</script>
<?php } ?>
<div class="container-fluid-full">
    <div class="row-fluid">
        
        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="index.php"><i class="halflings-icon home"></i></a>
                    <!--<a href="#"><i class="halflings-icon cog"></i></a>-->
                </div>
                <h2>Login to your account</h2>
                <form class="form-horizontal" action="" method="POST">
                    
                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" type="text" placeholder="type username"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>
							

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
<?php include 'footer.php'; ?>