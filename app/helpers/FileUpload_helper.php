<?php 

    function uploadFile($file, $file_name, $location) {
        $target = PUBROOT.$location.$file_name;
        
        return move_uploaded_file($file, $target);
    }

    function updateImage($old, $file, $file_name, $location) {

        unlink($old);
        $target = PUBROOT.$location.$file_name;
        
        return move_uploaded_file($file, $target);
    }

    function deleteImage($file) {
        if(unlink($file)) {
            return true;
        } else {
            return false;
    }
}


?>