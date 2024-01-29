<?php
$title = "Strona Główna | System Ogrodnictwa";
require_once "./components/header/header.php"
?>
<div class="site__header">
    <h1>Pracownicy</h1>
</div>


<div class="card__wrapper">
   <?php include_once $_SERVER['DOCUMENT_ROOT'] . "./components/employees/index.php" ?>
</div>

<?php
require_once "./components/footer/footer.php"
?>


