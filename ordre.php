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
          <p><a id="logo" href="harrypotter.php"><span class="hp">Harry Potter</span><br>Magical Creatures
          </p>
        </div>
      </header>
      <nav>
      <ul class="Menu">
        <li><a id="AboutUs" href="acceuil.php">Acceuil</a></li>
        <li><a id="Table" href="harrypotter.php?#Tableau">Liste</a>
          <ul>
            <li><a id="sub" href="#">Ordre Croissant</a><li>
            <li><a id="sub" href="#">Ordre Décroissantt</a><li>
          </ul>
        </li>

        <li><a id="Contribute" href="Contribute.php?#htext">Gestion</a>
          <ul>
            <li><a id="sub" href="#">Créer</a><li>
            <li><a id="sub" href="#">Modifier</a><li>
            <li><a id="sub" href="#">Supprimer</a><li>
          </ul>
        </li>
      </ul>
      </nav>
<table id="Tableau">
        <tr>
          <th class="table">Nom
          </th>
          <th class="table">Description
          </th>
          <th class="table">id
          </th>
          <th class="table">image
          </th>
        </tr>
<?php
$rep_txt = "./txt";
$rep_img = "./img";
$tableau = array();
if ($dir_txt = opendir($rep_txt)) {
    echo "<br>";
    while ($filename = readdir($dir_txt)) {
        if ($filename != "." && $filename != "..") {
            $path = $rep_txt . "/" . $filename;
            $file = fopen($path, "r");
            while (!feof($file)) {
                $line                = fgets($file);
                $separe              = explode(" : ", $line);
                $tableau[$separe[0]] = $separe[1];
                asort($tableau);
            }
            fclose($file);
            echo "<tr>";
            foreach ($tableau as $key => $value) {
                if ($key == "image") {
                  echo "<td><img src=" . $rep_img . '/' . $tableau["image"] . " width='100px'></td>"; 
                }else {
                  echo "<td>" . $value . "</td>";
                } 
            } 
            echo "</tr>";
        }
    }
}

?>
      </table>
      </nav>
    </main>
  </body>
<footer id="Footer">
<p id="Copyright">Ont contribués : <cite>GUILLAUME Anais, FALCETTA Nicolas et QEDIRA Fares</cite> (RAN 1-3)</p>
<a id="up" href="#logo">Haut de Page</a>
</footer>
</html>