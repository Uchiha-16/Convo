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


                //Input Data
                $data = [
                    'userID' => $_SESSION['userID'],
                    'title' => trim($_POST['title']),
                    'tags' => $tag,
                    'date' => trim($_POST['date']),
                    'time' => trim($_POST['time']),
                    'expertID' => trim($_POST['rp']),  
                    'userID_err' => '',
                    'title_err' => '',
                    'tag_err' => '',
                    'date_err' => '',
                    'time_err' => '',
                    'expertID_err' => '',
                ];

                //print_r($data);
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
                if(empty($data['expertID'])) {
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
                        echo '<input type="radio" value="'. $d->expertID .'" name="rp" id="checkbox1"/>';
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

        public function acceptConsult($consultID){
                
                $userID = $_SESSION['userID'];
                $consults = $this->consultsModel->Accept($consultID, $userID);
    
                if($consults) {
                    flash('reg_flash', 'Appointment Accepted!');
                    redirect('Consults/accept');
                } else {
                    die('Something went wrong');
                    redirect('Consults/accept');
                }
        }

        public function search(){
            $search = $_POST['keywords'];

            $userID = $_SESSION['userID'];
            $Myconsults = $this->consultsModel->Mysearch($search);
            $Notconsults = $this->consultsModel->Notsearch($search);
            
            $data = [
                'consults' => $consults
            ];

            foreach($consults as $consults){
                echo '<div class="question-div">
                        <div class="info">';
                          
                            $dateString = $consults->date;
                            $dateTime = new DateTime($dateString);

                            $year = $dateTime->format('Y');
                            $month = $dateTime->format('M');
                            $day = $dateTime->format('d');

                          echo'  <div class="calander">
                                <div class="cal1">
                                    <label>'. $month .'</label>
                                </div>
                                <div class="cal2">
                                    <label>'. $day .'</label>
                                </div>
                            </div>
                        </div>';

                       date_default_timezone_set('Asia/Colombo'); 
                        
                        // Convert the future date to a Unix timestamp
                            $futureTimestamp = strtotime($dateString);

                            // Get the current Unix timestamp
                            $currentTimestamp = time();

                            // Calculate the time difference between the future and current timestamps
                            $timeDifference = $futureTimestamp - $currentTimestamp;

                            // Convert the time difference to days
                            $daysRemaining = ceil($timeDifference / (60 * 60 * 24));

                        echo'<div class="content-display">
                            <h3><?php echo $consults->title ?></h3>
                            <label class="name-label"> Approved By '. $consults->fName. " ". $consults->lName .'</label>
                            <label class="time-label">'.$consults->time .'</label>
                            <div class="date-count">';
                            if($consults->date < date()){
                                echo '<button style="float:left" class="decline">Expired</button>';
                            }else{
                                echo '<button style="float:left" class="decline">'. $daysRemaining .' Days Remaining</button>
                        }
                            </div>
                        </div>
                        <div class="appointment">
                            <label>Upcoming</label>
                        </div>
                    </div> ';
            }
        }
    }

?>