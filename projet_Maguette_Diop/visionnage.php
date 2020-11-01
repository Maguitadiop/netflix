<?php 
    require_once('session_verif.php');
    try{
        $dbh = new PDO('mysql:host =localhost;dbname=nantflix;charset = utf8','root','');
        $id_serie = $_GET['ids'];
        $id_episode = $_GET['ide'];
        $series = $dbh->query('SELECT * from serie  where id_serie='.$id_serie);
        $serie = $series->fetch();
        $utilisateur = $dbh->query('SELECT * from utilisateur where email="'.$email.'"');
    $b = $utilisateur->fetch();
    }catch(PDOException $e){
        echo $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
	<title>Visionnage</title>
</head>
<body>
   <?php include("entete.php"); ?>
   <h3>  <b>chere / cher <?php echo $b['prenom'];?>,vous avez commencez la lecture de
   la serie '<?php echo $serie['intitule']; ?>' , le prochain episode à consulter est 
   l'episode : <?php echo $id_episode; ?><b></h3><br>
   <div class="container">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" href=""></a>
          </li>
        </ul>

        <table class="table">
       <thead>
         <tr>
          <th scope="col">liste des episodes</th>
       </tr >
       </thead>
       <tbody>
            <tr>
             <td> 
             <?php for($i=1;$i<=$serie['nombre_episode'];$i++){?>
                  <a href="episode.php?ide=<?php echo $i;?>" class="badge badge-success">episode<?php echo $i;?></a>   
                  <?php  } ?>
             </td>
            </tr>
  </tbody>
</table>
   <?php include("pied.php"); ?>

 <script src="/js/jquery-3.3.1.slim.min.js" ></script>
<script src="/js/popper.min.js" ></script>
<script src="/js/bootstrap.min.js" ></script>
</body>
</html>