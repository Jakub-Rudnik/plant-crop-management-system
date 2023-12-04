<?php
function find($data,$id){
    $array = array($data)[0];
    foreach ( $array as $element ) {
        $elemId = $element["id"] ?? 0;
        if ( $id == $elemId) {
            return $element;
        }
    }
    return false;
}
