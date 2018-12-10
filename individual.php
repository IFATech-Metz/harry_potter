<!Doctype html>
<html> 
  <head>
    <link rel="stylesheet" href="stylesheet.css" type="text/css" />
    <title>Creatures des Mondes Magiques
    </title>
  </head>
  <body> 
    <main>
      <header>
        <div class="Titre">
          <p><a id="logo" href="index.php"><span class="hp">Harry Potter</span><br>Magical Creatures
          </p>
        </div>
      </header>
      <nav>
      <ul class="Menu">
        <li><a id="AboutUs" href="index.php">Acceuil</a></li>
        <li><a id="Table" href="harrypotter.php?#Tableau">Liste</a></li>

        <li><a id="Contribute">Gestion</a>
          <ul>
            <li><a id="sub" href="create.php">Creer</a><li>
            <li><a id="sub" href="modif.php">Modifier</a><li>
            <li><a id="sub" href="delete.php">Supprimer</a><li>
          </ul>
        </li>
      </ul>
      </nav>
      <table>
        <tbody>
<?php
$id = $_GET['creature'];
$rep_txt = "./txt";
$rep_img = "./img";
$chemin =$rep_img."/".$id.".jpg";

$file = fopen($rep_txt."/".$id.".txt","r") or die("Erreur de l'ouverture du fichier texte");

while(($line = fgets($file)) != false) {
    $colonne = explode('*%',$line);
for($i = 0; $i <= 2; $i++){
    echo "<tr>";
    echo "<td class='Table'>". $colonne[$i]."</td>";
    echo "</tr>";
  }
    echo "<tr>";
    echo "<td><center><img src='$chemin' width='200px'><center></td>";
    echo "</tr>";
}

?>
        </tbody>
      </table>
  </body>