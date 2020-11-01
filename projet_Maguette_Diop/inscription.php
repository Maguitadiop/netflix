<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inscription</title>
  <style>
       h2{
         background-color:gray;
         border : 3px double;
         border-radius:100px;
         text-align:center;
       }
       form{
         margin-left:180px;
       }
      button{
        width:150px;
        background-color:gray;
      }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 <h2>INSCRIPTION</h2>
<form action="" method="POST"> 
<div id ='bloc'></div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Email : </label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Mot de passe :</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="mot_de_passe">
    </div>
  </div>
  <div class="form-group col-md-10">
    <label for="inputAddress"> Prenom : </label>
    <input type="text" class="form-control" id="inputAddress" placeholder="votre nom " name="prenom">
  </div>
  <div class="form-group col-md-10">
    <label for="inputAddress2">Nom : </label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="votre prenom" name ="nom">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Date de naissance : </label>
      <input type="text" class="form-control" id="inputCity" name="date_naissance">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Telephone : </label>
      <input type="text" class="form-control" id="inputZip" name="telephone">
    </div>
  </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <button name="envoyer">Inscrire</button>
</form>
</div><br>
<div class="precede"><a href="index.php"> Cliquez ici pour retourner </a></div>
<?php 
   if(isset($_POST['envoyer'])){
		if(!empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['prenom'])
		 && !empty($_POST['nom']) && !empty($_POST['date_naissance']) && !empty($_POST['telephone'])){
			$email = $_POST['email'];
			$mot_de_passe = $_POST['mot_de_passe'];
      $prenom = $_POST['prenom'];
      $nom = $_POST['nom'];
			$date_naissance = $_POST['date_naissance'];
			$telephone = $_POST['telephone'];
			try{
				$dbh = new PDO('mysql:host =localhost;dbname=nantflix;charset = utf8','root','');
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			//preparation de la requete d'insertion
				$pre = $dbh->prepare('INSERT INTO utilisateur(email,mot_de_passe,prenom,nom,date_naissance,telephone)
				 VALUES(:email, :mot_de_passe, :prenom, :nom, :date_naissance, :telephone)');
                //execution de la requete
                $rep = $pre->execute(
                    array(
            ':email' => $email,
            ':mot_de_passe' => $mot_de_passe,
            ':prenom' => $prenom,
						':nom' => $nom,
						':date_naissance' => $date_naissance,
						':telephone' => $telephone,
                    )
					);
					if($rep){
            echo '<script>alert("Inscription reussi. Merci de vous connecter")</script>';
            header('Location:index.php');
            exit();
                    }else{
                        echo 'probleme dans l\'ajout';
                    }

            }
            else{
                echo '<script>alert("Tous les champs sont obligatoire")</script>';
            }
        }
?>

</body>
</html>
