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
          <ul>
            <li><a id="sub" href="#">Ordre Croissant</a><li>
            <li><a id="sub" href="#">Ordre Décroissantt</a><li>
          </ul>
        </li>

        <li><a id="Contribute" href="Contribute.php?#htext">Gestion</a>
          <ul>
            <li><a id="sub" href="create.php">Créer</a><li>
            <li><a id="sub" href="modif.php">Modifier</a><li>
            <li><a id="sub" href="delete.php">Supprimer</a><li>
          </ul>
        </li>
      </ul>
      </nav>

    </main>
    

<h1>Modifiez votre créature</h1>

<form action="modif.php" method="post" name="modif">

  modifiez une créature <select name="id" required >

    <?php
    if ($handle = opendir('./txt')){
        while ($entry = readdir($handle)) {
            if ($entry != "." && $entry != ".."){
                echo "<option value=".$entry.">".trim($entry,'.txt')."</option>";
            }
        }
        closedir($handle);
    }
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
                $separe              = explode(" : ", $line);
                $tableau[$separe[0]] = $separe[1];
            }
            fclose($file);
            //echo "<tr>";
          foreach ($tableau as $key => $value) {
              $description = $tableau["description"];
              $nom = $tableau["nom"];
          }
        }
    }
}
<<<<<<< HEAD
  echo "</select><br><br>";
  echo 'Nom : <input type="text" name="nom" ><br><br>
    description <br>
    <textarea name="description" cols="30" rows="10" value= '.$description.' ></textarea><br><br>'; 
   ?> 
  
  <input type="submit" name="modif">


</form>

</body>
=======
?>
<script>
var name=prompt("Nom :");
$.ajax(
{
    type: "POST",
    url: "/modif.php",
    data: name,
    success: function(data, textStatus, jqXHR)
    {
        console.log(data);
    }
});
</script>
      </table>
    </main>
  </body>
<footer id="Footer">
<p id="Copyright">Ont contribués : <cite>GUILLAUME Anais, FALCETTA Nicolas et QEDIRA Fares</cite> (RAN 1-3)</p>
<a id="up" href="#logo">Haut de Page</a>
</footer>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
</html>
=======
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
        <li><a id="Table" href="harrypotter.php?#Tableau">Liste</a>
          <ul>
            <li><a id="sub" href="#">Ordre Croissant</a><li>
            <li><a id="sub" href="#">Ordre Décroissantt</a><li>
          </ul>
        </li>

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
          <th class="table">Nom
          </th>
          <th class="table">Description
          </th>
          <th class="table">id
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
                $line                = fgets($file);
                $separe              = explode(" : ", $line);
                $tableau[$separe[0]] = $separe[1];
            }
            fclose($file);
            echo "<tr>";
            foreach ($tableau as $key => $value) {
                echo "<td>".$value."</td>";
            }
            echo "<td><img src=".$rep_img.'/'.$tableau["id"].".JPG width='100px' ></td>";
            echo '<script>
              var form = "<form action=\'modif.php\' method=\'post\' value=\'$tableau[id]\'>
                  Nom<input type=\'text\' name=\'nom\' ><br><br>
                  Description<input type=\'text\' name=\'description\'><br><br>
                  </form>";
              alert(form);
              </script>\';
            <img src=\'modif.png\' alt='' height=\'42\' width=\'42\'></button></td></form>;
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
>>>>>>> 576065ce17b3c026a36ae87975f298ff261dacc0
</html>