<?php
$PAGE_TITLE = "Uprawa 24";
require_once "./includes/header.php"
?>
<div class="site__header">
    <h1>Uprawy</h1>
    <button class="btn" title="Dodaj uprawę" onclick="createModal('crop-add')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="var(--text-800)" width="20" height="20">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
        <span>Dodaj uprawę</span>
    </button>
</div>

<?php
$cropsStr = file_get_contents(dirname('index.php') . '/mockup-data/crops.json');
$crops = json_decode($cropsStr, true);
?>
<div class="card__wrapper">
    <?php
    foreach ($crops as $crop) {
        $cropId = $crop['id'] ?? 0;

       $editBtn = '<a class="btn btn__accent" onclick="createModal(\'crop-edit' . '\', ' . $cropId . ')">Edytuj</a>';

       echo "<div class='card'>
                <h3 class='card__title'>
                    "; echo $crop['name'] ?? ""; echo " 
                </h3>
                <div class='card__body'>
                    <h5>Aktulane parametry:</h5>
                    <p class='parameters'>Wielkość uprawy: "; echo $crop['quantity'] ?? ""; echo "</p>
                    <p class='parameters'>Wiglotność podłoża: "; echo $crop['humidity'] ?? ""; echo "%</p>
                </div>
                <div class='card__footer'>
                    <a class='btn btn__primary' href='/uprawa/"; echo $crop['id'] ?? ""; echo "'>Przejdź</a>";
                    echo $editBtn .
                "</div>
            </div>";
    }; ?>
</div>

<?php
require_once "./includes/footer.php"
?>