<!Doctype html>
<html> 
  <head>
      <meta charset="utf-8"/>
    <link rel="stylesheet" href="stylesheet.css" type="text/css" />
    <title>Creatures des Mondes Magiques
    </title>
  </head>
  <body> 
    <main>
      <header>
        <div class="Titre">
          <p><a id="logo" href="acceuil.php"><span class="hp">Harry Potter</span><br>Magical Creatures</p>
        </div>
      </header>
      <nav>
      <ul class="Menu">
        <li><a id="AboutUs" href="acceuil.php">Acceuil</a></li>
        <li><a id="Table" href="harrypotter.php?#Tableau">Liste</a></li>

        <li><a id="Contribute" href="Contribute.php?#htext">Gestion</a>
          <ul>
            <li><a id="sub" href="create.php">Créer</a><li>
            <li><a id="sub" href="modif.php">Modifier</a><li>
            <li><a id="sub" href="delete.php">Supprimer</a><li>
          </ul>
        </li>
      </ul>
      </nav>
<table id="Tableau">
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
<?php

$rep_txt = "./txt";
$rep_img = "./img";

if ($dir_txt = opendir($rep_txt)) {

    while ($filename = readdir($dir_txt)) {
        if ($filename != "." && $filename != "..") {
            $tableau = array();
            $path = $rep_txt . "/" . $filename;
            $file = fopen($path, "r");
            while (!feof($file)) {
                $line                = fgets($file);
                $separe              = explode("*%", $line);
                //$tableau[$separe[0]] = $separe[1];
            }
            fclose($file);
            $id = $separe[0];
            echo "<tr>";
            foreach ($separe as $value) {
                echo "<td><a class='tlink' href='individual.php?creature=$id#Table'>" . $value . "</a></td>";
            }
            $chemin =$rep_img."/".$id.".jpg";
            echo "<td><a class='tlink' href='individual.php?creature=$id#Table'.><img src='$chemin' width='100px'></a></td>";
            echo "</tr>";
        }
    }
}

?>
      </table>
    </main>
  </body>
<footer id="Footer">
<p id="Copyright">Ont contribués : <cite>GUILLAUME Anais, FALCETTA Nicolas et QEDIRA Fares</cite> (RAN 1-3)</p>
<a id="up" href="#logo">Haut de Page</a>
</footer>
</html>
