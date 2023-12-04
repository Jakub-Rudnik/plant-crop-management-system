<?php
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        echo 404;
        break;
    case "POST":
        $_POST = json_decode(file_get_contents('php://input'), true);
        $id = $_POST['id'] ?? 0;
        $title = $_POST['title'] ?? "";

        $cropsStr = file_get_contents(dirname('index.php') . '/mockup-data/crops.json');
        $varietiesStr = file_get_contents(dirname('index.php') . '/mockup-data/varieties.json');

        $crops = json_decode($cropsStr, true);
        $varieties = json_decode($varietiesStr, true);
        function findCrop($array, $id) {
            foreach ($array as $elem) {
                if ($elem['id'] == $id) return $elem;
            }
        }
        $crop = findCrop($crops, $id);

        echo "
            <div class='modal__background'></div>
            <div class='modal'>
                <div class='modal__header'>
                    <h3 class='modal__title'>$title</h3>
                    <button class='btn btn__icon' title='Zamknij okno' onclick='closeModal()'>
                        <svg xmlns='http://www.w3.org/2000/svg' fill='var(--text-800)' viewBox='0 0 24 24' stroke-width='1.5' stroke='var(--text-800)' width='24' height='24'>
                            <path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12' />
                        </svg>
                    </button>
                </div>
                <div class='modal__body'>
                    <form>
                    <div class='form-control'>
                        <label for='cropName' >Nazwa uprawy</label>
                        <input id='cropName' type='text' value='"; echo $crop['name'] ?? ""; echo "'/>
                    </div>
                    <div class='form-control'>
                        <label for='variant'>Odmiana</label>
                            <select id='variant'>";
                                foreach ($varieties as $variety) {
                                    echo "<option value='"; echo $variety['id'] ?? ""; echo "'";
                                    echo ($variety['id'] ?? 0) === ($crop['variety'] ?? 0) ? "selected" : "";
                                    echo ">"; echo $variety['name'] ?? ""; echo"</option>";
                                    }
                    echo  "</select>
                    </div>
                    <div class='form-control'>
                        <label for='quantity'>Wielkość uprawy</label>
                        <input id='quantity' type='number' value='"; echo $crop['quantity'] ?? ""; echo "'/>
                    </div>
                    <div class='form-control'>
                        <label for='humidity'>Wilgotność</label>
                        <input id='humidity' type='number' value='"; echo $crop['humidity'] ?? ""; echo "'/>
                    </div>
                    <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
                    </form>
                </div>
            </div>
        ";
}