<?php
$navElements = [
    (object)[
        "path" => "/",
        "name" => "Panel"
    ],
    (object)[
        "path" => "/uprawy",
        "name" => "Uprawy"
    ],
    (object)[
        "path" => "/harmonogram",
        "name" => "Harmonogram"
    ],
    (object)[
        "path" => "/pracownicy",
        "name" => "Pracownicy"
    ],
];

$path = $_SERVER['REQUEST_URI'];
?>

<header class="main__header">
    <div class="main__header__top">
        <button id="menuBtn" class="main__header__btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <p class="main__header__logo">Chryzantemka</p>
    </div>
    <nav id="nav" class="main__header__nav">
        <ul>
            <?php
            foreach ($navElements as $navElement):
            ?>
            <li>
                <a class="main__header__nav__link <?=$path == $navElement->path ? 'main__header__nav__link--active' : ''?>" href="<?=$navElement->path?>"><?=$navElement->name?></a>
            </li>
            <?php
            endforeach;
            ?>
        </ul>
    </nav>
</header>