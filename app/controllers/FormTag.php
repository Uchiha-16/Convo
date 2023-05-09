<?php

class FormTag extends Controller {
    
    private $formtagM;
  
  public function __construct() {
    $this->formtagM = $this -> model('formtagM');
  }

  public function add(){
    $Tags =  $_POST['tags'];
    $Value = $_POST['value'];
    $this->formtagM->submitTag($Tags,$Value);

    $data = [

    ];
    $this->view('FormTag/add', $data);

  }
}


?>
