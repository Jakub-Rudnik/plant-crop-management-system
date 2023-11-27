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

<aside class="main__header">
    <div class="main__header__top">
        <button id="menuBtn" class="main__header__btn">
            <svg xmlns="http://www.w3.org/2000/svg" id="menuIcon" fill="var(--text-800)" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--text-800)" width="24" height="24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" id="closeIcon" fill="var(--text-800)" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
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
</aside>