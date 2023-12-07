<?php

require ("./PokemonsManager.php");
require ("header.php");
$manager = new PokemonsManager();
?>

<main class ="container">
<form method = "post"></form>
    <label for = "number" class="form-label">Number</label>
    <input type="number" name="number" id="number" class="form-control" min="1" max="800">

</main>
