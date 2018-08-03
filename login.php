<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>

	<!-- Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

	<!-- Load css bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
	
	<!-- Load css style -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="body-login">
    <!-- container -->
	<div class="container">
        <h2 class="form-signin-heading">Por favor, registrese</h2>
        <form class="form-signin">
            <input type="text" id="inputUser" class="form-control" placeholder="Usuario" required autofocus>
            <input type="password" id="inputPassword" class="form-control password" placeholder="Contraseña" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Recuerdame
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse
            </button>
        </form>
    </div> <!-- end container -->
</body>
</html>