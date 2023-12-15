<?php

require ("PokemonsManager.php");
require ("header.php");
require("./TypesManager.php");
$manager = new PokemonsManager();

$typeManager = new TypesManager();
$types = $typeManager->getAll();

if($_POST){
    $number = $_POST["number"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $type1 = $_POST["type1"];
    $type2 = $_POST["type2"];

    var_dump($_FILES);

    if($_FILES["image"]["size"] < 2000000){
       $imageManager = new ImagesManager();
       $fileName = $_FILES["image"]["name"];

       if(!is_dir("upload/")){
           if (!mkdir("upload/") && !is_dir("upload/")) {
               throw new \RuntimeException(sprintf('Directory "%s" was not created', "upload/"));
           }
       }
       $targetFile = "upload/{$fileName}";
       $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
       var_dump($fileName);
    }
}

//var_dump($types);
?>

<main class ="container">
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
        <option value="">---</option>
        <?php
        foreach($types as $type): ?>
            <option value="<?= $type->getId() ?>"><?=$type->getName()?></option>
        <?php endforeach ?>

    </select>

        <br>
    <label for="image"
    <div class="mb-3">
        <label for="formFile" class="form-label"></label>
        <input class="form-control" type="file" id="formFile">
    </div>

    <input type = "submit" class="bt btn-danger mt-3" class="btn-danger">
</form>
</main>
