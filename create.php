<?php

require ("./PokemonsManager.php");
require ("header.php");
require("./TypesManager.php");
require ("./ImagesManager.php");
//require("./Image.php");
$pokemonManager = new PokemonsManager();

$typeManager = new TypesManager();
$types = $typeManager->getAll();
$error = null;

if($_POST){
    $number = $_POST["number"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $idType1 = $_POST["type1"];
    $idType2 = $_POST["type2"] === "null" ? null : $_POST["type2"];

    //var_dump($_FILES);
try{
    if($_FILES["image"]["size"] /*< 2000000*/){
       $imagesManager = new ImagesManager();
       $fileName = $_FILES["image"]["name"];
       if (!is_dir("upload/")){
           mkdir("upload/");
       }
       $targetFile = "upload/{$fileName}";
       $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
        //var_dump($fileExtension);
        define("EXTENSIONS", ["png", "jpeg", "jpg", "webp"]);

       if(in_array(strtolower($fileExtension) ,EXTENSIONS)) {
           if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
             $imagesManager = new ImagesManager();
             $image = new Image(["name" => $fileName, "path" => $targetFile]);
             //var_dump($image);
             $imagesManager->create($image);
           }else{
               throw new Exception("Une erreur est survenue..");
           }
       }else {
           throw new Exception("L'extension du fichier n'est pas correcte");
       }
    }else{
        throw new Exception("Le fichier soumis est trop important");
    }
}catch(Exception $e){
    $error = $e->getMessage();
}

      $idImage = $imagesManager->getLastImageId();
//var_dump($idImage);
      $newPokemon = new Pokemon([
              "number" => $number,
      "name" => $name,
      "description" => $description,
          "type1" => $idType1,
      "type2" => $idType2,
          "image" => $idImage,

      ]);
      $pokemonManager->create($newPokemon);
      header("Location: index.php");
      }

//var_dump($types);
?>

<main class ="container">
    <?php
    if($error) {
        echo "<p class = 'alert alert-danger'>$error</p>";
    }?>
<form method = "post" enctype="multipart/form-data">
    <label for = "number" class="form-label">Number</label>
    <input type="number" name="number" placeholder="Pokemon's number" id="name" class="form-control" min="1" max="901">
    <label for = "name" class="form-label">Name</label>
    <input type="text" name="name" placeholder="Pokemon's name" id="name" class="form-control" min="1" max="901">
    <label for = "description" class="form-label">Description</label>
    <textarea name ="description" id="description" class="form-control" rows="6" placeholder="Pokemon's description" minlength="10" maxlength="101"></textarea><br>
    <!--div class="form-floating"-->
<label for="type1" class="form-label">Type1</label><br>

        <select name="type1" id="type1" class="form-select">
           <option value="">---</option>
           <?php
           foreach($types as $type): ?>
               <option value="<?= $type->getId() ?>"><?=$type->getName()?></option>
            <?php endforeach ?>

        </select> <br>

    <label for="type2" class="form-label">Type2</label><br>

    <select name="type2" id="type2" class="form-select">
        <option value="null">---</option>
        <?php
        foreach($types as $type): ?>
            <option value="<?= $type->getId() ?>"><?=$type->getName()?></option>
        <?php endforeach ?>

    </select> <br>

<!--label for="image" class="form-label">Image</label><br>

    <select name="image" id="image" class="form-select">
        <option value="">---</option>
        <?php
        foreach($types as $type): ?>
            <option value="<?= $type->getId() ?>"><?=$type->getName()?></option>
        <?php endforeach ?>

    </select-->

        <br>
    <label for="image" class="form-label">Image</label>
    <!--div class="mb-3"-->
    <input type="file" name="image" id="image" class="form-control">
    <!--/div-->

    <input type = "submit" class="btn btn-danger mt-3" value="Create">

</form>
</main>
