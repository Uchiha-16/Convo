<?php 

    function uploadImage($img, $img_name, $location) {
        $target = PUBROOT.$location.$img_name;
        
        return move_uploaded_file($img, $target);
    }

    function updateImage($old, $img, $img_name, $location) {

        unlink($old);
        $target = PUBROOT.$location.$img_name;
        
        return move_uploaded_file($img, $target);
    }

    function deleteImage($img) {
        if(unlink($img)) {
            return true;
        } else {
            return false;
    }
}

function round_half_up($num, $decimal_places) {
    $factor = pow(10, $decimal_places);
    $num = round($num * $factor);
    return $num / $factor;
}



?>