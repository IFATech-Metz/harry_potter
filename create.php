<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylesheet.css" type="text/css" />
  <title>créez votre fiche</title>
</head>
<body>

<h1 class ="titre">Ajoutez votre personnage</h1><br>

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
<br><br><br>

<form enctype="multipart/form-data" action="create.php" method="post">
      <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
      Transfèrer le fichier : <input type="file" name="monfichier" required/><br><br>
      Index du fichier : <input type="number" name="id" required><br><br>
      Nom de votre créature : <input type="text" name="nom" required><br><br>
      Description : <br><textarea name="desc" cols="50" rows="10" required></textarea><br><br>
      <input type="submit" name="submit1" value="upload"/>
    </form>
<?php

if (isset($_POST["submit1"])) {
$nomOrigine = $_FILES['monfichier']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("jpeg", "jpg",);
$filename = './img/'.$_POST['id'].'.jpg';
$beastname = $_POST['nom'];
$desc = $_POST['desc'];
$id = $_POST['id'];

// si le fichier existe dans le dossier img 
    if (file_exists($filename)){

        echo "Ce fichier existe déja";

    }
// si le fichier n'existe pas
    else{
        if (!(in_array($extensionFichier, $extensionsAutorisees))) {
                                echo "Le fichier n'a pas l'extension attendue, jpeg ou jpg";  
        }
        else { // Copie dans le repertoire img avec un nom                                
                                $repertoireDestination = dirname(__FILE__)."/img/";
                                $nomDestination = $_POST['id'].".".$extensionFichier;
                                if (move_uploaded_file($_FILES["monfichier"]["tmp_name"],$repertoireDestination.$nomDestination)) {    
                                    $text = fopen('./txt/'.$id.'.txt','w');
                                    $contenu = "titre : ".$beastname."\r\ndescription : ".$desc."\r\nid : ".$id;         
                                    fwrite($text,$contenu);                                                              //creation du fichier txt
                                    echo "Votre créature ".$beastname." a bien été ajoutée au catalogue";                //confirmation de l'ajout
                                }
                                else {
                                    echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
                                            "Le déplacement du fichier temporaire a échoué".
                                            " vérifiez l'existence du répertoire ".$repertoireDestination;
                                }
        }
    }
}
?>
</body>
</html>