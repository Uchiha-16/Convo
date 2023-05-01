<?php 

    function uploadFile($file, $file_name, $location) {
        $target = PUBROOT.$location.$file_name;
        
        return move_uploaded_file($file, $target);
    }

    function updateFile($old, $file, $file_name, $location) {

        unlink($old);
        $target = PUBROOT.$location.$file_name;
        
        return move_uploaded_file($file, $target);
    }

    function deleteFile($file) {
        if(unlink($file)) {
            return true;
        } else {
            return false;
    }
}


?>