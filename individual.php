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
        <li><a id="Table" href="harrypotter.php?#Tableau">Liste</a>
          <ul>
            <li><a id="" href="#">Ordre Croissant</a><li>
            <li><a id="" href="#">Ordre Décroissantt</a><li>
          </ul>
        </li>

        <li><a id="Contribute" href="Contribute.php?#htext">Gestion</a>
          <ul>
            <li><a id="sub" href="create.php">Creer</a><li>
            <li><a id="sub" href="modif.php">Modifier</a><li>
            <li><a id="sub" href="delete.php">Supprimer</a><li>
          </ul>
        </li>
      </ul>
      </nav>
      <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Nom</td>
                <td>Description</td>
                <td>Image</td>
            <tr>
     </thead>
        <tbody>
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
                $line                = fgets($file);
                $separe              = explode("*%", $line);
                //$tableau[$separe[0]] = $separe[1];
            }
            fclose($file);
            echo "<tr><type='submit' name='id' value='value' action='./individual.php'>";
            foreach ($separe as $value) {
                echo "<td>".$value."</td>";
            }
            $chemin =$rep_img."/".$separe[0].".JPG";
            echo "<td><img src='$chemin' width='100px'></td>";
            echo "</tr>";
        }
    }
}
?>
        </tbody>
      </table>

      </body>