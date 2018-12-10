<!Doctype html>
<html> 
  <head>
      <meta charset="utf-8"/>
    <link rel="stylesheet" href="stylesheet.css" type="text/css" />
    <title>Suppression
    </title>
  </head>
  <body> 
    <main>
      <header>
        <div class="Titre">
          <p><a id="logo" href="index.php"><span class="hp">Harry Potter</span><br>Magical Creatures</p>
        </div>
      </header>
      <nav>
      <ul class="Menu">
        <li><a id="AboutUs" href="index.php">Acceuil</a></li>
        <li><a id="Table" href="harrypotter.php?#Tableau">Liste</a>
          <ul>
            <li><a id="sub" href="#">Ordre Croissant</a><li>
            <li><a id="sub" href="#">Ordre Décroissantt</a><li>
          </ul>
        </li>

        <li><a id="Contribute" href="Contribute.php?#htext">Gestion</a>
          <ul>
            <li><a id="sub" href="create.php">Créer</a><li>
            <li><a id="sub" href="#">Modifier</a><li>
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
          <th id="delete">delete
          </th>
        </tr>
<?php
$rep_txt = "./txt";
$rep_img = "./img";
if (isset($_POST['supp'])){
                if (file_exists($rep_txt."/".$_POST['supp'].".txt")){
                  $view = fopen($rep_txt."/".$_POST['supp'].".txt","a");
                  // unlink ($rep_txt."/".$_POST['supp'].".txt");
                  // unlink ($rep_img."/".$_POST['supp'].".jpg");
                  $separe[3]=0;
                  fputs($view,$separe[3]);
                  echo "votre créatures a bien été supprimée";
                }
                fclose($view);
}
if ($dir_txt = opendir($rep_txt)) {
    
    echo "<br>";
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
            echo "<tr>";
           if ($separe[3] == 1){
              for ($i=0; $i <3 ; $i++) { 
                echo "<td>".$separe[$i]."</td>";
              }

              $chemin =$rep_img."/".$separe[0].".JPG";
              echo "<td><img src='$chemin' width='100px'></td>";
              echo "<form action='delete.php' method='post' name='delete'><td><button type='submit' name='supp' value='$separe[0]'>
              <img src='del.png' alt='' height='42' width='42'></button></td></form>";
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