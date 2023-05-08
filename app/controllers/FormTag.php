<?php

// class FormTag extends Controller {
    
//     private $formtagM;
  
//   public function __construct() {
//     $this->formtagM = $this -> model('formtagM');
//   }
  
//   public function submitForm() {
//     $usertag = $_POST['tag'];

//     print_r($usertag);

//     $str = '';


//             foreach($usertag as $tag) {
//                 $str = $str . 'usertag.tag = "' . $tag . '" OR ';

//             }

//             $str = substr($str, 0, -4);

    
//     $response = $this->formtagM->submitForm($usertag);
    
//     $data = [
//         'response' => $response,
//     ];

//     $this->view('questions/add', $data);
    
//     header('Content-Type: application/json');
//     echo json_encode($response);
//   }
// }

// $controller = new FormTag();

// if (isset($_GET['action'])) {
//   if ($_GET['action'] === 'submit_form') {
//     $controller->submitForm();
//   }
// }

?>
