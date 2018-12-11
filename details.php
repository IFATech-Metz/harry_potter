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
            if (isset($_GET["creat"])){
                $path = $rep_txt.$_GET["creat"].".txt";
                $file = fopen($path,"r");
                    while (!feof($file)) {
                    $line                = fgets($file);
                    $separe              = explode("*%", $line);
                    }
                fclose($file);
            }


                if(isset($_POST["modif"])){
                    $path = $rep_txt.$_GET["creat"].".txt";
                    $id = $_POST["id"];
                    $nom = $_POST["nom"];
                    $description = $_POST["description"];
                    $file = fopen($path,"w");
                    $contenu = $id."*%".$nom."*%".$description."*%1";
                    fwrite($file,$contenu);
                    echo "Votre créature a bien été modifiée";
                }


?>
        
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
            <tr>
                <td><?php echo $separe[0]; ?>
                </td>
                <td><?php echo $separe[1]; ?>
                </td>
                <td><?php echo $separe[2]; ?>
                </td>
                <td><?php echo "<img src='img/$separe[0].jpg' widht='300px' height='300px'>" ?>
                </td>
            </tr>
        </table>
        <br><br>

            <form action="details.php?creat=<?php echo $_GET['creat'];?>" method=post>
                <input type="text" name="id" value="<?php echo $separe[0]; ?>" hidden>
                <label>Nom : </label><input type="text" name="nom" value="<?php echo $separe[1]; ?>" required><br><br>
                <label>Description : </label><br>
                <textarea name="description" cols="100" rows="5" required><?php echo $separe[2]; ?></textarea><br><br>

                <input type="submit" name="modif" value="modifiez">
            </form>

</body>
</html>