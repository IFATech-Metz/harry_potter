<!Doctype html>
<html> 
  <head>
      <meta charset="utf-8"/>
      <link rel="icon" href="https://www.favicon.cc/logo3d/799742.png" />
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
        <li><a id="Table" href="harrypotter.php?#Tableau">Creatures</a>
        </li>

        <li><a id="Contribute">Gestion</a>
          <ul>
            <li><a id="sub" href="create.php">Créer</a><li>
            <li><a id="sub" href="modif.php#Tableau">Modifier</a><li>
            <li><a id="sub" href="delete.php#Tableau">Supprimer</a><li>
          </ul>
        </li>
      </ul>
      </nav>
<table id="Tableau">
        <tr>
        <th class="table">id
          </th>
          <th class="table">Nom
          </th>
          <th class="table">Description
          </th>
          <th class="table">image
          </th>
          <th id="delete">Supprimer
          </th>
        </tr>
<?php
$rep_txt = "./txt";
$rep_img = "./img";
if (isset($_POST['supp'])){
                if (file_exists($rep_txt."/".$_POST['supp'].".txt") AND file_exists($rep_img."/".$_POST['supp'].".jpg")){
                  unlink ($rep_txt."/".$_POST['supp'].".txt");
                  unlink ($rep_img."/".$_POST['supp'].".jpg");
                    echo "la créature a bien été supprimé";
                }
}

if ($dir_txt = opendir($rep_txt)) {

    while ($filename = readdir($dir_txt)) {
        if ($filename != "." && $filename != "..") {
            $tableau = array();
            $path = $rep_txt . "/" . $filename;
            $file = fopen($path, "r");
            while (!feof($file)) {
                $line                = fgets($file);
                $separe              = explode("*%", $line);

            }
            fclose($file);

            $id = $separe[0];
            echo "<tr>";
            if ($separe[3] == 1){
              for ($i=0; $i <3 ; $i++) { 
                echo "<td><a class='tlink' href='individual.php?creature=$separe[0]#Table'>".$separe[$i]."</a></td>";
              }
            echo "<td><img src=" . $rep_img . '/' . $id . ".JPG width='100px' ></td>";
            echo "<form action='delete.php' method='post' name='delete'><td><button class='button1' type='submit' name='supp' value='$id'><img src='delete.png' alt='' height='42' width='42'></button></td></form>";
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