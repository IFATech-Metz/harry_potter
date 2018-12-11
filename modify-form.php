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
            <p><a id="logo" href="index.php"><span class="hp">Harry Potter</span><br>Magical Creatures</p>
        </div>
    </header>
    <nav>
        <ul class="Menu">
            <li><a id="AboutUs" href="index.php">Acceuil</a></li>
            <li><a id="Table" href="harrypotter.php?#Tableau">Liste</a></li>

            <li><a id="Contribute">Gestion</a>
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
            <th class="table">image
            </th>
        </tr>
<?php
$id = $_GET['creature'];
$rep_txt = "./txt";
$rep_img = "./img";
$chemin = $rep_img . "/" . $id . ".jpg";

     $file= fopen($rep_txt . "/" . $id . ".txt", "r") or die("Erreur de l'ouverture du fichier texte");
     while (($line = fgets($file)) != false) {
     $colonne= explode('*%', $line);
    
        echo "<tr>";
        echo "<td class='Table'>" . $colonne[1] . "</td>";
        echo "<td class='Table'>" . $colonne[2] . "</td>";
        echo "<td><img src='$chemin' width='200px'></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<form name='modify-form' action='modify-form.php?creature=$_GET[creature]'id='modif-form'method=POST><td class='Table'><center><textarea name='nom' form='modif-form' rows='5' cols='15'>".$colonne[1]."</textarea><center></td>";
        echo "<td class='Table'><center><textarea name='description' form='modif-form' width='50px' rows='5' cols='100'>".$colonne[2]."</textarea><center></td>";
        echo "<td class='Table'><center><input type='submit' name='mod' class='button' value='Enregistrer les Modifications'><center></form></td>";
        echo "</tr>";
        

if (isset($_POST['mod'])){

    $filetxt=fopen($rep_txt."/". $id.".txt","w");
    $holder= $separe[0]."*%".$_POST['nom']."*%".$_POST['description']."*%1";  
    fwrite($filetxt,$holder);
    echo "votre créature".$_POST['nom']." à bien été modifier";
    fclose($filetxt);
    
    $image= $rep_img."/".$id.".jpg";
      if ($image=="jpg")
      
    
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
