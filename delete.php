<?php

require"./PokemonsManager.php";

$pokemonManager = new PokemonsManager();
//var_dump('');
$pokemonManager->delete($_GET["id"]);

?>

<script>
    window.location.href = "./index.php"
</script>
