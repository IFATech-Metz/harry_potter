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
        <li><a id="Table" href="harrypotter.php?#Tableau">Créatures</a></li>
        <li>Gestion
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
    
    $rep_txt = "./txt";
    $rep_img = "./img";
    
     if ($dir_txt = opendir($rep_txt)) {
      echo "<br>";
     while ($filename = readdir($dir_txt)) {
        if ($filename != "." && $filename != "..") {
            $tableau = array();
            $path = $rep_txt . "/" . $filename;
            $file = fopen($path, "r");
            $fichier=str_replace(".txt.","", $filename);
            if isset($_POST[$fichier]){
              $dir=$rep_txt."/".$fichier.".txt";
              $path_txt=fopen($dir,"r");
            }
            while (!feof($path_txt)) {
                $line                = fgets($path_txt);
                $separe              = explode("*%", $line);
                //$tableau[$separe[0]] = $separe[1];
            }   

            /*fclose($file);
            echo "<tr>";
            foreach ($separe as $value) {
                echo "<td>".$value."</td>";
            }*/
            $chemin =$rep_img."/".$separe[0].".JPG";
            echo "<td><img src='$chemin' width='100px'></td>";
            echo "</tr>";
            echo "<form action='modif.php' method='post' name='edit'><td><button type='submit' name='edit' value='$separe[0]'>
            <img src='edit.jpg' alt='' height='42' width='42'></button></td></form>";
            
        }
    }
}
<div>
 <p class='add'>vous modifiez la fich de <?php echo $separe[0]?></p><br>
 <form class="add"> action="modif.php" method="POST">
<div class= 'left'>ID:<br>
   <input type='text' class='input' name =''<?php echo $separe[0]?><br>
</div>
<div class ='left'>Titre:<br>
   <input type='text' class='textInput'name='titre' value="<?php echo $separe[1]?>"><br>
</div>
<div class ='center'>Description :<br>
<input type ='text' class='textInput'name="description" value ="<?php echo $separe[2]?>"><br>
</div>
<div>Nowimage:<br>
<img src="<?php echo $rep_img."/".$separe[0].".jpg"?>" height='42'>
</body>
</html>