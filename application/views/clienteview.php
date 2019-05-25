<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	  <style>
	    html, body{
      height:100%;
      margin: 0;
      /* Esto permite que el div de la derecha ocupe todo el alto de la pagina */
    }
	  	#izq{
	  		float: left;
	  		width: 50%;
    		padding-top: 200px;
    		padding-left: 150px;
    		background-color:#F2F2F2;
    		height: 100%;
	  	}
	  	#der{
	  		float: right;
	  		width: 50%;
	  		height: 100%;
	  		background-color: #a60000;
	  		padding-top: 50px;
    		padding-left: 30px;
    		padding-right: 60px;
	  	}
	  	.txt1{
	  		font-family: Arial, Helvetica, sans-serif;
	  		font-size: 27px;
	  		color: #ffffff;
	  	}
	  	.txt2{
	  		font-family: Arial, Helvetica, sans-serif;
	  		font-size: 17px;
	  		color: #ffffff;
	  	}
	  	.txt3{
	  		font-family: Arial, Helvetica, sans-serif;
	  		font-size: 13px;
	  		color: #ffffff;
	  	}

	  </style>
	<title>Bienvenido a MEDIS</title>
</head>
<body>
	<div id="izq"><img src="http://localhost/medis/assets/img/MEDIS_2_300.png" alt="Medis" class="img-rounded"></div>
	<div id="der"><p class="txt1">Bienvenido a MEDIS</p>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="email" class="txt2">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Ingrese su correo" name="email">
    </div>
    <div class="form-group">
      <label for="pwd" class="txt2">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Ingrese su contraseña" name="pswd">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> <span class="txt3">Recuérdame</span>
      </label>
    </div>
    <button type="submit" class="btn btn-outline-light btn-block">Ingresar</button>
  </form>
  <br>
  <br>
  <br>
  <p class="txt3">Si no tiene una cuenta MEDIS, obtenga una gratis resistrándose <a href="<?=base_url()?>index.php/ClientesController/regview">aquí!</a></p>
</div>
</body>
</html>
