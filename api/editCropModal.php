<?php
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "POST":
        $_POST = json_decode(file_get_contents('php://input'), true);
        $id = $_POST['id'] ?? 0;

        $cropsStr = file_get_contents(dirname('index.php') . '/mockup-data/crops.json');
        $varietiesStr = file_get_contents(dirname('index.php') . '/mockup-data/varieties.json');

        $crops = json_decode($cropsStr, true);
        $varieties = json_decode($varietiesStr, true);

        $crop = null;
        foreach ($crops as $crop) {
            if ($crop->id ?? 0 == $id) return $crop = $crop;
        }

        echo "
             <form>
                <div class='form-control'>
                    <label for='cropName' >Nazwa uprawy</label>
                    <input id='cropName' type='text' value='"; echo $crop['name']; echo "'/>
                </div>
                <div class='form-control'>
                    <label for='variant'>Odmiana</label>
                        <select id='variant'>";
                            foreach ($varieties as $variety) {
                                echo "<option value='"; echo $variety['id']; echo "'";
                                echo $crop['id'] == $id ? "selected" : "";
                                echo ">"; echo $variety['name']; echo"</option>";
                                }
                echo  "</select>
        </div>
        <div class='form-control'>
            <label for='quantity'>Wielkość uprawy</label>
            <input id='quantity' type='number' value='"; echo $crop['quantity']; echo "'/>
        </div>
        <div class='form-control'>
            <label for='humidity'>Wilgotność</label>
            <input id='humidity' type='number' value='"; echo $crop['humidity']; echo "'/>
        </div>
        <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
     </form>
        ";


}