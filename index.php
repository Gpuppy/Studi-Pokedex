

<body >
<?php

require ("./PokemonsManager.php");
require ("header.php");
$manager = new PokemonsManager();
$pokemons = $manager->getAll('');
//var_dump($pokemons);

?>


<main class="container">
    <section class="-fluid d-flex flex-wrap justify-content-center">
    <?php
    foreach($pokemons as $pokemon): ?>
    <div class="card m-5" style="width: 18rem;">
        <img src="images/001.png" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title"><?= $pokemon->getName() ?>#<!--?= $pokemon->getNumber() ?--></h5>
                  <p class="card-text"><?= $pokemon->getDescription() ?></p>
            <a href="#" class="btn btn-warning">Modifier</a>
        </div>
    </div>
<?php endforeach; ?>
    </section>
    <button>
    <a href= "./create.php" class"btn btn-danger">Create a Pokemon!</a></button>
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
</html>




    

