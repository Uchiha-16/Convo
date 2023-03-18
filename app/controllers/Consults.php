<?php
    class Consults extends Controller {
        private $consultsModel;
        public function __construct() {
            $this->consultsModel = $this -> model('consultsM');
        }

        public function index(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
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

                //Input Data
                $data = [
                    'title' => trim($_POST['title']),
                    'tag' => $tag,
                    'date' => trim($_POST['date']),
                    'time' => trim($_POST['time']),
                    'resourceID' => trim($_POST['rp']),    
                    'title_err' => '',
                    'tag_err' => '',
                    'date_err' => '',
                    'time_err' => '',
                    'rp_err' => '',
                ];

                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter Title';
                }

                // Validate Tag
                if($data['tag'] == '0') {
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
                if($data['resourceID'] == '0') {
                    $data['rp_err'] = 'Please Select One Resource Person';
                }


                // Make sure errors are empty
                if(empty($data['title_err']) && empty($data['tag_err']) && empty($data['date_err']) && empty($data['time_err'])) {
                    // Adding Question
                    if($this->consultsModel->add($data)) {
                        $LastID = $this->consultsModel->getLastID();

                        foreach($data['tag'] as $tag){
                           if(!($this->consultsModel->questionTag($tag, $LastID->QID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }
                            flash('reg_flash','Question Added Successfully');
                            redirect('questions/myquestions');
                        
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
                    'title' => '',
                    'tag' => '',
                    'date' => '',
                    'time' => '',
                    'resourceID' => '',   
                    'title_err' => '',
                    'tag_err' => '',
                    'date_err' => '',
                    'time_err' => '',
                    'rp_err' => '',
                ];
                $this->view('consults/add', $data);
            }
        }

        public function requests(){
            $data = [];
            $this->view('consults/requests', $data);
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
                        echo '<input type="checkbox" value="last 3 months" name="rp[]" id="checkbox1"/>';
                        echo '<span class="checkbox">'. $d->fName ." ". $d->lName . '</span>';
                    echo '</label>';
                echo '</li>';
            }
        }
    }

?>