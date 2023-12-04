<?php
$PAGE_TITLE = "Uprawa 24";
require_once "./includes/header.php"
?>
<div class="site__header">
    <h1>Uprawy</h1>
    <button class="btn" title="Dodaj uprawę" onclick="createModal(addCropModal)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="var(--text-800)" width="20" height="20">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
        <p>Dodaj uprawę</p>
    </button>
</div>

<div class="card__wrapper">
</div>

<script src="../js/crops.service.js" type="module"></script>
<?php
require_once "./includes/footer.php"
?>
