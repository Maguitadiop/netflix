<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css"/>
    <title>Recherche d'un serie</title>
</head>
<body>

<?php include("entete.php"); ?>

<h2>Résultat de recherche</h2>
<?php
 try {
    $dbh = new PDO('mysql:host =localhost;dbname=nantflix;charset = utf8','root','');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$series= $dbh->query('SELECT * FROM serie ORDER BY id_serie DESC');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $series = $dbh->query('SELECT* FROM serie WHERE intitule LIKE "%'.$q.'%" ORDER BY id_serie DESC');
    if($series->rowCount() == 0) {
        $series = $dbh->query('SELECT * FROM serie WHERE CONCAT(intitule,nombre_episode,acteurs_principaux,realisateur,annee_de_sortie
                              ) LIKE "%'.$q.'%" ORDER BY id_serie DESC');
    }
}
if($series ->rowCount() > 0) { ?>
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
 <?php } else { ?>
    Aucun résultat pour:  <?= $q ?>...
    <?php } ?>
     <br>
<?php include("pied.php"); ?>
<script src="/js/jquery-3.3.1.slim.min.js" ></script>
<script src="/js/popper.min.js" ></script>
<script src="/js/bootstrap.min.js" ></script>
</body>
</html>