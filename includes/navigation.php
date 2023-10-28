<?php
$navElements = [
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
    <a class="main__header__logo" href="/">Chryzantemka</a>
    <nav class="main__header__nav">
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