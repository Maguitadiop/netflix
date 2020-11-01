<?php 
require_once('session_verif.php');
try{
    $dbh = new PDO('mysql:host =localhost;dbname=nantflix;charset = utf8','root','');
    $series = $dbh->query('SELECT * from serie ORDER BY intitule');
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
	<title>Series</title>
</head>
<body>
   <?php include("entete.php"); ?>
   <form method="GET" action ="/rechercher.php">
          <input type="search" name="q" placeholder="Recherche..." />
          <input type="submit" value="Rechercher" />
 </form><br>
   <marquee><h2> Bienvenue!<b><?php echo $b['prenom']; ?> </b>Voici la liste des series disponible </h2></marquee><br>
   <div class="container">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" href=""></a>
          </li>
        </ul>

        <table class="table">
       <thead>
         <tr>
          <th scope="col">#</th>
          <th scope="col">Intitule</th>
          <th scope="col">Nombre d'episode</th>
          <th scope="col">Acteurs principaux</th>
          <th scope="col">Realisateur</th>
          <th scope="col">Annee de sortie</th>
          
       </tr >
       </thead>
       <tbody>
       <?php   foreach($series as $key => $serie) : ?>
       <tr  onclick="document.location.href='visionnage.php?ids=<?php echo $serie['id_serie'];?>'">
      <th scope="row"><?php echo $key+1; ?></th>
      <td><?php echo $serie['intitule'];?></td>
      <td><?php echo $serie['nombre_episode'];?></td>
      <td><?php echo $serie['acteurs_principaux'];?></td>
      <td><?php echo $serie['realisateur'];?></td>
      <td><?php echo $serie['annee_de_sortie'];?></td>
    </tr>
        <?php   endforeach; ?>
  </tbody>
</table>
   <?php include("pied.php"); ?>

   <script src="/js/jquery-3.3.1.slim.min.js" ></script>
<script src="/js/popper.min.js" ></script>
<script src="/js/bootstrap.min.js" ></script>
</body>
<html>