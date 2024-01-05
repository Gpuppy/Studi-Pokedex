<body >
<?php

//Get Heroku ClearDB connection information
$jawsdb_url = parse_url(getenv("JAWSDB_DATABASE_URL"));
$jawsdb_server = $jawsdb_url["host"];
$jawsdb_username = $jawsdb_url["user"];
$jawsdb_password = $jawsdb_url["pass"];
$jawsdb_db = substr($jawsdb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($jawsdb_server, $jawsdb_username, $jawsdb_password, $jawsdb_db);


require ("header.php");
require ("./PokemonsManager.php");
$manager = new PokemonsManager();
require 'ImagesManager.php';
$imagesManager = new ImagesManager();
$pokemons = $manager->getAll("");
//var_dump($pokemons);

?>


<main class="container">
    <section class="d-flex flex-wrap justify-content-center">
    <?php
    foreach($pokemons as $pokemon): ?>
       <?php ($imagesManager->get($pokemon->getImage())) ?>
    <div class="card m-5" style="width: 18rem;">
        <img src="<?= $imagesManager->get($pokemon->getImage())->getPath() ?>" class="card-img-top" alt="<?= $pokemon->getName() ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $pokemon->getName() ?>#<?= $pokemon->getNumber() ?></h5>
                  <p class="card-text"><?=$pokemon->getDescription()?></p>
            <a href="#" class="btn btn-warning">Update</a>
            <a href="./delete.php?id=<?= $pokemon->getId()?>" class=" btn btn-danger">Delete</a>
        </div>
    </div>
<?php endforeach; ?>
    </section>
    <button>
    <a href= "./create.php" class= "btn btn-success">Create a Pokemon!</a></button>
    <!--div class="card m-5" style="width: 18rem;">
        <img src="images/025.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Pikachu</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-warning">Modifier</a>
        </div>
    </div>

    <div class="card m-5" style="width: 18rem;">
        <img src="images/004.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Salamèche</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-warning">Modifier</a>
        </div>
    </div-->

</main>
</body>





    

