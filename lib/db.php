<?php
$conn = mysqli_connect('localhost', 'root', '', 'chryzantemka');

function getCultivations($conn) {
    $query = "SELECT c.cultivationID, c.name, c.humidity , c.quantity, c.temperature, c.watering FROM cultivations AS c";
    $result = mysqli_query($conn, $query);

    $html = "";

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $editBtn = '';

            $html = $html . "
                    <div class='card'>
                        <h3 class='card__title'>
                            " . $row['name'] . " 
                        </h3>
                        <div class='card__body'>
                            <h5>Aktulane parametry:</h5>
                            <p class='parameters'>Wielkość uprawy: " . $row['quantity'] . "</p>
                            <p class='parameters'>Wiglotność podłoża: " . $row['humidity'] . "%</p>
                        </div>
                        <div class='card__footer'>
                            <a class='btn btn__primary' href='/uprawa/" . $row['cultivationID'] . "'>Przejdź</a>
                            <a class='btn btn__accent' hx-get='../modals/edit-cultivation.php?id=" . $row['cultivationID'] . "' hx-target='body' hx-swap='afterbegin' >Edytuj</a>
                        </div>
                    </div>";
        }
    }

    mysqli_close($conn);
    return $html;
}

function getCultivation($conn, $id) {
    $query = "SELECT c.cultivationID, c.name, c.humidity , c.quantity, c.temperature, c.watering, v.varietyID, v.name AS 'variety_name' FROM cultivations AS c, variety AS v WHERE c.varietyID = v.varietyID AND c.cultivationID = $id";
    $result = mysqli_query($conn, $query);

    $row = null;

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    mysqli_close($conn);
    return $row;
}