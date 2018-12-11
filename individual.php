<!Doctype html>
<html> 
  <head>
  <link rel="icon" href="https://www.favicon.cc/logo3d/799742.png" />
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
        <li><a id="AboutUs" href="index.php">Accueil</a></li>
        <li><a id="Table" href="harrypotter.php?#Tableau">Creatures</a></li>

        <li><a id="Contribute">Gestion</a>
          <ul>
            <li><a id="sub" href="create.php">Creer</a><li>
            <li><a id="sub" href="modif.php#Tableau">Modifier</a><li>
            <li><a id="sub" href="delete.php#Tableau">Supprimer</a><li>
          </ul>
        </li>
      </ul>
      </nav>
      <table>
      <thead>
      <tr>
          <th class="table">ID
          </th>
          <th class="table">Nom
          </th>
          <th class="table">Description
          </th>
          <th class="table">image
          </th>
        </tr>
      </thead>
        <tbody>
<?php
$id = $_GET['creature'];
$rep_txt = "./txt";
$rep_img = "./img";
$chemin =$rep_img."/".$id.".jpg";

$file = fopen($rep_txt."/".$id.".txt","r") or die("Erreur de l'ouverture du fichier texte");

while(($line = fgets($file)) != false) {
    $colonne = explode('*%',$line);
    echo "<tr>";
for($i = 0; $i <= 2; $i++){
    echo "<td class='Table'>". $colonne[$i]."</td>";
  }
    echo "<td><center><img src='$chemin' width='200px'><center></td>";
    echo "</tr>";
}

?>
        </tbody>
      </table>
  </body>
