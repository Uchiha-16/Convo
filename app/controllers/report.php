<?php
    class report extends Controller {
        public function __construct(){
            $this->reportModel = $this -> model('reportM');
        }
        public function index(){
            // do something here
        }

        public function addReport(){
            if($_SERVER['REQUEST_METHOD']=='POST'){

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                $checkbox_value= isset($_POST['visibility'])? 'anonymus': 'public';


                $data=[
                    'title' => trim($_POST['title']),
                    'type' => trim($_POST['type']),
                    'visibility' => $checkbox_value,
                    'reason' => trim($_POST['reason']),
                    'description' => trim($_POST['description']),
                    'date' => date('Y-m-d H:i:s'),
                    'title_err' =>'',
                    'type_err' =>'',
                    'description_err'=>'',
                
                ];

                if (empty($data['title'])){
                    $data['title_err']='Please enter Title';
                }

                if(empty($data['type'])){
                    $data['type_err']='Please select Type';
                }

                if(empty($data['description'])){
                    $data['description_err']='Please add a description';
                }

                if(empty($data['title_err']) && empty($data['type_err']) && empty($data['description_err'])) {

                    if($this->reportModel->add($data)){
                        // $LastID =$this ->reportModel ->getLastID();
                     
                        flash('reg_flash','Report Added Successfully');
                        redirect('repot/adddReport');
                    
                }else{
                    die('Something went wrong');
                }
            } else{
                $this->view('report/addReport',$data);
            }
        }
        else{
            $data =[
                'title' => '',
                'type' =>'',
                'visibility' => '',
                'reason' =>'',
                'description' =>'',
                'title_err' =>'',
                'type_err' =>'',
                'description_err' =>'',
            ];

            $this->view('report/addReport',$data);
        }
    }
}
?>