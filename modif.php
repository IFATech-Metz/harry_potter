<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>modification</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="stylesheet.css" />
  <script src="main.js"></script>
</head>
<body>

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
  echo "</select><br><br>";
  echo 'Nom : <input type="text" name="nom" ><br><br>
    description <br>
    <textarea name="description" cols="30" rows="10" value= '.$description.' ></textarea><br><br>'; 
   ?> 
  
  <input type="submit" name="modif">


</form>
  
</body>
</html>