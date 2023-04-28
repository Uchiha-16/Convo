<?php
    class Events extends Controller {
        private $eventsModel;
        public function __construct() {
            $this->eventsModel = $this -> model('eventsM');
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');

                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';

                $resource = isset($_POST['rp']) ? $_POST['rp'] : '0';

                //Input Data
                $data = [
                    'userID' => $_SESSION['userID'],
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content']),
                    'link' => trim($_POST['link']),
                    'tags' => $tag,
                    'date' => trim($_POST['date']),
                    'time' => trim($_POST['time']),
                    'expertID' => $resource,    
                    'userID_err' => '',
                    'title_err' => '',
                    'link_err' => '',
                    'tag_err' => '',
                    'date_err' => '',
                    'content_err' => '',
                    'time_err' => '',
                    'expertID_err' => '',
                ];

                //print_r($data);
                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter Title';
                }

                // Validate Zoom Link
                if(empty($data['link'])) {
                    $data['link_err'] = 'Please enter Zoom Link';
                }

                // Validate Zoom Link
                if(empty($data['content'])) {
                    $data['content_err'] = 'Please enter a Description';
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
                if(empty($data['userID_err']) && empty($data['title_err']) && empty($data['tag_err']) && empty($data['date_err']) && empty($data['time_err']) && empty($data['expertID_err']) && empty($data['link_err'])) {
                    // Adding Question
                    if($this->eventsModel->add($data)) {
                        $LastID = $this->eventsModel->getLastID();
                        

                        foreach($data['expertID'] as $RP){
                           if(!($this->eventsModel->eventhandling($RP, $LastID->eventID)))
                            {
                                die('Something went wrong when selecting experts');
                            }
                        }

                        foreach($data['tags'] as $tag){
                           if(!($this->eventsModel->eventtag($tag, $LastID->eventID)))
                            {
                                die('Something went wrong when inserting the tags');
                            }
                        }

                        flash('reg_flash','Event Added Successfully');
                        redirect('events/index');
                        
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('events/add', $data);
                }
            }
            else {
                $data = [
                    'userID' => '',
                    'title' => '',
                    'content' => '',
                    'link' => '',
                    'tags' => '',
                    'date' => '',
                    'time' => '',
                    'expertID' => '',   
                    'userID_err' => '',
                    'title_err' => '',
                    'content_err' => '',
                    'link_err' => '',
                    'tag_err' => '',
                    'date_err' => '',
                    'time_err' => '',
                    'expertID_err' => '',
                ];
                $this->view('events/add', $data);
            }
        }

        public function index(){
            $usertag = $this->eventsModel->getUserTag();
            $str = '';
            foreach($usertag as $tag) {
                $str = $str . 'eventtag.tag = "' . $tag->tag . '" OR ';
    
            }
            $str = substr($str, 0, -4);

            $events = $this->eventsModel->getevents($str); 
                
            $tags = $this->eventsModel->getEventTags();

            $resourcePerson = $this->eventsModel->getResourcePerson();

            // $qualifications = $this->eventsModel->getQualification();
            
            $data = [
                'events' => $events,
                'tags' => $tags,
                'resourcePerson' => $resourcePerson,
                // 'qualifications' => $qualifications,
                'usertag' => $usertag,
            ];


            $this->view('events/index', $data);
        }

        public function pending(){

            $userID = $_SESSION['userID'];

            $pendingEvents = $this->eventsModel->getPendingEvents($userID);
            $eventstatus = $this->eventsModel->eventstatus();

            $data = [
                'userID' => $userID,
                'pendingEvents' => $pendingEvents,
                'eventstatus' => $eventstatus,
            ];

            $this->view('events/pending', $data);
        }

        public function editEvent($EID){
            $userID = $_SESSION['userID'];

            $event = $this->eventsModel->getEvent($EID);
            $tag = $this->eventsModel->eventTags($EID);

            $data = [
                'userID' => $userID,
                'event' => $event,
                'tag' => $tag->tags,
                'title_err' => '',
                'content_err' => '',
                'tag_err' => '',
                'link_err' => '',
                'date_err' => '',
                'time_err' => '',
            ];

            $this->view('events/editEvent', $data);
        }
    }

?>