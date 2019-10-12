<?php
  session_start();
  if(isset($_SESSION['user']) || isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">

<style type="text/css">
  .login-index img{
    width: 600px;
    margin-left: -100px;
    opacity: 0.8;
    margin-bottom: 15px;
  }

  .login-logo {
    background-color: #1D8348;
    margin-bottom: 0;
    height: 70px;
    padding-top: 8px;
    font-size: 30px;
    color: #F2F3F4;
  }



</style>

<div class="login-box">
  <div class="login-index">
    <img src="../images/logo.png">
  </div>
  	<div class="login-logo">
  		<b>Inicio de Sesión</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Ingresa tus credenciales para iniciar la sesión</p>

    	<form action="login/login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Usuario" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-success btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Ingresar</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>