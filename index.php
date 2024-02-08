<body>
<?php

require_once ('vendor/autoload.php');
require(".env");
require ("header.php");
require "./PokemonsManager.php";
require './ImagesManager.php';
use Dotenv\Dotenv as Dotenv;
$manager = new PokemonsManager();
$imagesManager = new ImagesManager();
$pokemons = $manager->getAll();



 public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/vendor/autoload.php');
        $dotenv->load();

        $this->hostname = $_ENV['HOSTNAME'];
        $this->username = $_ENV['USERNAME'];
        $this->dbname = $_ENV['DBNAME'];
        $this->password = $_ENV['PASSWORD'];

        try {
            $dbh = new PDO($this->hostname, $this->username, $this->dbname, $this->password);
        } catch (PDOException $e) {
            die('attempt to retry the connection after some timeout for example');
        }

    }



/*$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');*/

/*try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
/*require(sprintf("%s/../vendor/autoload.php", __DIR__));*/


/*$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$hostname = $_ENV['$hostname'];
$username = $_ENV['$username'];
$password = $_ENV ['$password'];
$dbName = $_ENV['$dbname'];*/

/*$JAWSDB_DATABASE_URL = parse_url(getenv("mysql://pg5vb9547j5p7ewi:chjijzyrqpkmjzbh@d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/ejta5rbv6riwb80b"));*/

/*try {
    $conn = new PDO("mysql:host=d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=ejta5rbv6riwb80b", 'pg5vb9547j5p7ewi', 'chjijzyrqpkmjzbh');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}*/
?>


<main class="container">
    <section class="d-flex flex-wrap justify-content-center">
    <?php
    foreach($pokemons as $pokemon): ?>
       <?php ($imagesManager->get($pokemon->getImage())) ?>
    <div class="card m-5" style="width: 18rem;">
        <img src="<?= $imagesManager->get($pokemon->getImage())->getPath() ?>" class="card-img-top" alt="<?= $pokemon->getName() ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $pokemon->getName() ?>#<!--?= $pokemon->getNumber() ?></h5-->
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
<footer>
    <?php
require("./footer.php");
?>
</footer>





    

