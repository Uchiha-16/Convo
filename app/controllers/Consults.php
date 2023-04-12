<?php
    class Consults extends Controller {
        private $consultsModel;
        public function __construct() {
            $this->consultsModel = $this -> model('consultsM');
        }

        public function index(){

            $userID = $_SESSION['userID'];
            $consults = $this->consultsModel->getConsults($userID);

            

            $data = [
                'consults' => $consults
            ];

            $this->view('consults/index', $data);
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                

                if($tag != '0')
                    $tag = implode(",", $tag);

                echo $tag;

                $resource = isset($_POST['rp']) ? $_POST['rp'] : '0';

                if($resource != '0')
                    $resource = implode(",", $resource);

                //Input Data
                $data = [
                    'userID' => $_SESSION['userID'],
                    'title' => trim($_POST['title']),
                    'tags' => $tag,
                    'date' => trim($_POST['date']),
                    'time' => trim($_POST['time']),
                    'expertID' => $resource,    
                    'userID_err' => '',
                    'title_err' => '',
                    'tag_err' => '',
                    'date_err' => '',
                    'time_err' => '',
                    'expertID_err' => '',
                ];

                print_r($data);
                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter Title';
                }

                // Validate Tag
                if($data['tags'] == '0') {
                    $data['tag_err'] = 'Please Select One or More Tags';
                }

                // Validate Date
                if(empty($data['date'])) {
                    $data['date_err'] = 'Please enter Date';
                }

                // Validate Time
                if(empty($data['time'])) {
                    $data['time_err'] = 'Please enter Time';
                }

                // Validate Resource
                if($data['expertID'] == '0') {
                    $data['expertID_err'] = 'Please Select One Resource Person';
                }


                // Make sure errors are empty
                if(empty($data['userID_err']) && empty($data['title_err']) && empty($data['tag_err']) && empty($data['date_err']) && empty($data['time_err']) && empty($data['expertID_err'])) {
                    // Adding Question
                    if($this->consultsModel->add($data)) {
                            flash('reg_flash','Consultation Added Successfully');
                            redirect('consults/requests');
                        
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('consults/add', $data);
                }
            }
            else {
                $data = [
                    'userID' => '',
                    'title' => '',
                    'tags' => '',
                    'date' => '',
                    'time' => '',
                    'expertID' => '',   
                    'userID_err' => '',
                    'title_err' => '',
                    'tag_err' => '',
                    'date_err' => '',
                    'time_err' => '',
                    'expertID_err' => '',
                ];
                $this->view('consults/add', $data);
            }
        }

        public function requests(){

            $userID = $_SESSION['userID'];

            $consults = $this->consultsModel->getRequests($userID);
            $data = [
                'consults' => $consults
            ];
            $this->view('consults/requests', $data);

            // print_r($data);
        }

        public function resourceName(){

            $selectedValues = $_POST['selectedValues'];

            $str = '';

            foreach($selectedValues as $tag) {
                $str = $str . 'usertag.tag = "' . $tag . '" OR ';

            }
            $str = substr($str, 0, -4);

            $data = $this->consultsModel->resourceName($str);
            
            foreach($data as $d){
                echo '<li>';
                    echo '<label for="checkbox1">';
                        echo '<input type="checkbox" value="'. $d->expertID .'" name="rp[]" id="checkbox1"/>';
                        echo '<span class="checkbox">'. $d->fName ." ". $d->lName . '</span>';
                    echo '</label>';
                echo '</li>';
            }
        }

        public function accepted() {
                
                $userID = $_SESSION['userID'];
                $consults = $this->consultsModel->AcceptedConsults($userID);
    
                $data = [
                    'consults' => $consults
                ];
    
                //print_r($data);
                $this->view('consults/accepted', $data);

        }

        public function accept(){
                $userID = $_SESSION['userID'];
                $consults = $this->consultsModel->AcceptConsults($userID);
    
                $data = [
                    'consults' => $consults
                ];
    
                //print_r($data);
                $this->view('consults/accept', $data);
        }
        
        public function declineAccept($consultID){

                $userID = $_SESSION['userID'];
                $consults = $this->consultsModel->DeclineConsults($consultID, $userID);
    
                if($consults) {
                    flash('reg_flash', 'Appointment Declined!');
                    redirect('Consults/accept');
                } else {
                    die('Something went wrong');
                    redirect('Consults/accept');
                }
        }

        public function decline($consultID){

            $userID = $_SESSION['userID'];
            $consults = $this->consultsModel->DeclineConsults($consultID, $userID);

            if($consults) {
                flash('reg_flash', 'Appointment Declined!');
                redirect('Consults/requests');
            } else {
                die('Something went wrong');
                redirect('Consults/requests');
            }
    }
    }

?>