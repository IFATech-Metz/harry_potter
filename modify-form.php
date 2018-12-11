<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>détails</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="stylesheet.css" />
    <script src="main.js"></script>
</head>
<body>

      <nav>
      <ul class="Menu">
        <li><a id="AboutUs" href="index.php">Acceuil</a></li>
        <li><a id="Table" href="harrypotter.php?#Tableau">Liste</a>
        </li>
        <li><a id="Contribute" >Gestion</a>
          <ul>
            <li><a id="sub" href="create.php">Créer</a><li>
            <li><a id="sub" href="modif.php">Modifier</a><li>
            <li><a id="sub" href="delete.php">Supprimer</a><li>
          </ul>
        </li>
      </ul>
      </nav><br>
        <?php
$rep_txt = "./txt/";
$rep_img = "./img/";

if(isset($_POST["modif"])){
    $path = $rep_txt.$_GET["creat"].".txt";
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $file = fopen($path,"w");
    $contenu = $id."*%".$nom."*%".$description."*%1";
    fwrite($file,$contenu);
    echo '<script>
        window.onload = function(){
          alert("La modification à bien été effectuée .");
        }
      </script>';
    }

    if (isset($_GET["creat"])){
        $path = $rep_txt.$_GET["creat"].".txt";
        $file = fopen($path,"r");
            while (!feof($file)) {
            $line                = fgets($file);
            $separe              = explode("*%", $line);
            }
        fclose($file);
    }
?>
        
        <table id="Tableau">
            <tr>
                <th class="table">Nom</th>
                <th class="table">Description</th>
                <th class="table">image</th>
            </tr>
            <tr>
                <td><?php echo $separe[1]; ?></td>
                <td><?php echo $separe[2]; ?></td>
                <td><center><?php echo "<img src='img/$separe[0].jpg' width='300px' height='300px'>" ?></center></td>
            </tr>
            <tr>
                <form action="modify-form.php?creat=<?php echo $_GET['creat'];?>#Tableau" method=post>
                                            <input type="text" name="id" value="<?php echo $separe[0]; ?>" hidden>
                    <td class='Table'><center><textarea name="nom" rows='5' cols='15' required><?php echo $separe[1]; ?></textarea></center></td>
                    <td class='Table'><center><textarea name="description" cols="100" rows="5" required><?php echo $separe[2]; ?></textarea></center></td>
                    <td class='Table'><center><input type="submit" name="modif" class="button"  value="Enregistrer"></center></td>
                </form>
            </tr>
        </table>
</body>
<footer id="Footer">
    <p id="Copyright">Ont contribués : <cite>GUILLAUME Anais, FALCETTA Nicolas et QEDIRA Fares</cite> (RAN 1-3)</p>
    <a id="up" href="#logo">Haut de Page</a>
</footer>
</html>
