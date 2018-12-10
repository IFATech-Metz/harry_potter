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
          <p>
            <a id="logo" href="index.php"><span class="hp">Harry Potter</span><br>Magical Creatures
          </p>
        </div>
      </header>
      <nav>
      <ul class="Menu">
        <li><a id="AboutUs" href="index.php">Acceuil</a></li>
        <li><a id="Table" href="harrypotter.php?#Tableau">Créatures</a>
        </li>

        <li><a id="Contribute">Gestion</a>
          <ul>
            <li><a id="sub" href="create.php">Créer</a><li>
            <li><a id="sub" href="modif.php">Modifier</a><li>
            <li><a id="sub" href="delete.php">Supprimer</a><li>
          </ul>
        </li>
      </ul>
      </nav>
    </main>
    <table>
      <tr>
          <th class="table">ID
          </th>
          <th class="table">Nom
          </th>
          <th class="table">Description
          </th>
          <th class="table">image
          </th>
          <th id="modif">Modifier
          </th>
        </tr>
<?php
    
    $rep_txt = "./txt";
    $rep_img = "./img";
    
     if ($dir_txt = opendir($rep_txt)) {
      echo "<br>";
     while ($filename = readdir($dir_txt)) {
        if ($filename != "." && $filename != "..") {
            $tableau = array();
            $path = $rep_txt . "/" . $filename;
            $file = fopen($path, "r");
            while (!feof($file)) {
                $line = fgets($file);
                $separe = explode("*%", $line);
                //$tableau[$separe[0]] = $separe[1];
            }
            fclose($file);
            echo "<tr>";
            if ($separe[3] == 1){
              for ($i=0; $i <3 ; $i++) { 
                echo "<td>".$separe[$i]."</td>";
              }

              $chemin =$rep_img."/".$separe[0].".JPG";
              echo "<td><img src='$chemin' width='100px'></td>";
              echo "<td><a class='tlink' href='modify-form.php?creature=$separe[0]#Table'><img src='./modifier.png' width='42px'></td>";
              echo "</tr>";
          }
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
