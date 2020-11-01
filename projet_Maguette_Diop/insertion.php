<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Series</title>
    <style>
        form{
            margin-left:400px;
        }
        button{
            width:150px;
			background-color:blue;
        }
		input{
			width:400px;
		}
		select{
			width:400px;
		}
		
    
    </style>
</head>
<body>
   <?php include("entete.php"); ?>
  
   <form action="" method="POST" >
    		<h2>Insertion serie :</h2>
    		<label><b>Intitule </b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    		<input name="intitule" type="text" ><br><br>	
    		<label><b>Nombre d'episode </b>:&nbsp;</label>
    		<select name="nombre_episode">
    			<option value="1">1</option>
    			<option value="2">2</option>
    			<option value="3">3</option>
    			<option value="4">4</option>
    			<option value="5">5</option>
    			<option value="6">6</option>
    			<option value="7">7</option>
    			<option value="8">8</option>
    			<option value="9">9</option>
    			<option value="10">10</option>
    			<option value="11">11</option>
    		</select><br><br>
            <label><b>Acteur principaux</b> :&nbsp;&nbsp;</label>
    		<input name="acteurs_principaux" type="text" ><br><br>
    		<label><b>Realisateur </b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    		<input name="realisateur" type="text" ><br><br>
            <label><b>Annee de sortie</b> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    		<select name="annee_de_sortie">
    			<option value="1960">1960</option>
    			<option value="1970">1970</option>
    			<option value="1980">1980</option>
    			<option value="1990">1990</option>
    			<option value="2000">2000</option>
    			<option value="2005">2005</option>
    			<option value="2010">2010</option>
    			<option value="2015">2015</option>
    			<option value="2016">2016</option>
    			<option value="2017">2017</option>
    			<option value="2018">2018</option>
                <option value="2019">2019</option>
    		</select><br><br>
    		<button name = "inserer"><b>INSERER</b></button>
    </form>
	<?php 
   if(isset($_POST['inserer'])){
		if(!empty($_POST['intitule']) && !empty($_POST['nombre_episode']) && !empty($_POST['acteurs_principaux'])
		 && !empty($_POST['realisateur']) && !empty($_POST['annee_de_sortie']) ){
			$intitule = $_POST['intitule'];
			$nombre_episode = $_POST['nombre_episode'];
            $acteurs_principaux = $_POST['acteurs_principaux'];
            $realisateur = $_POST['realisateur'];
			$annee_de_sortie = $_POST['annee_de_sortie'];
			try{
				$dbh = new PDO('mysql:host =localhost;dbname=nantflix;charset = utf8','root','');
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			//preparation de la requete d'insertion
				$pre = $dbh->prepare('INSERT INTO serie(intitule,nombre_episode,acteurs_principaux,realisateur,annee_de_sortie)
				 VALUES(:intitule, :nombre_episode, :acteurs_principaux, :realisateur, :annee_de_sortie)');
                //execution de la requete
                $rep = $pre->execute(
                    array(
                        ':intitule' => $intitule,
                        ':nombre_episode' => $nombre_episode,
                        ':acteurs_principaux' => $acteurs_principaux,
						':realisateur' => $realisateur,
						':annee_de_sortie' => $annee_de_sortie,
                    )
					);
					if($rep){
						echo '<script>alert("insertion reussi.")</script>';
						header('Location:serie.php');
                        exit();
                    }else{
                        echo 'probleme dans l\'ajout';
                    }

            }
            else{
                echo"Tous les champs sont obligatoire";
            }
        }
?>
   <?php include("pied.php"); ?>
</body>
<html>