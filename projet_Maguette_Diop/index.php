<?php
$error = isset($_GET['error']) ? $_GET['error'] :'';

if(isset($_POST['connecter'])){
	if(!empty($_POST['email']) && !empty($_POST['mot_de_passe'])){
		$email = $_POST['email'];
		$mot_de_passe = $_POST['mot_de_passe'];

		try{
			$dbh = new PDO('mysql:host =localhost;dbname=nantflix;charset = utf8','root','');
			$req = $dbh->query('SELECT * FROM utilisateur WHERE email="'.$email.'"');
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		 $a = $req ->fetch();
		if($email == ''){
			header('Location:index.php?error=1');
		}
		if($mot_de_passe != $a['mot_de_passe']){
			header('Location:index.php?error=2');
		}
		else{
			session_start();
			$_SESSION['email'] = $email;
			$_SESSION['mot_de_passe'] = $mot_de_passe;
			$_SESSION['logged'] = true;
			//Si le mot de passe es bon, on ne vas pas afficher le formulaire
			header("Location: serie.php");
            exit();

			//On enregistre son pseudo dans la session username et son identifiant dans la session userid

		}
	}
}
	
switch($error){
	case 1:
		echo "merci de saisir un login";
	break;
	case 2:
	    echo "le mot de passe n'est pas valide";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title p-b-26">
						NantFlix
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="mot_de_passe">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="connecter">
								Connecter
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Vous n'avez pas de compte?
						</span>

						<a class="txt2" href="inscription.php">
							S'inscrire
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

