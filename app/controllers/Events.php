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

            $currentDate = date('Y-m-d'); // get the current date in the format "YYYY-MM-DD"
            $events = $this->eventsModel->getevents($str, $currentDate); 
                
            $tags = $this->eventsModel->getEventTags();

            $resourcePerson = $this->eventsModel->getResourcePerson();

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

        public function eventRequests(){
            $userID = $_SESSION['userID'];

            $invites = $this->eventsModel->getInvitations($userID);
            $eventstatus = $this->eventsModel->eventstatusInvites();
            $mod = $this->eventsModel->getMod();

            $data = [
                'userID' => $userID,
                'invites' => $invites,
                'eventstatus' => $eventstatus,
                'mod' => $mod,
            ];

            $this->view('events/eventRequests', $data);
        }

        public function editEvent($EID){
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
                    if($this->eventsModel->updateEvent($EID, $data)) {

                        $existingExperts = $this->eventsModel->getEventExperts($EID);
                        $nr = array();
                        foreach ($existingExperts as $r) {
                            $nr[] = $r->userID;
                        }
                        foreach($data['expertID'] as $RP){
                            if (!(in_array($RP, $nr))){
                                if(!($this->eventsModel->eventhandling($RP, $EID))){
                                    die('Something went wrong when selecting experts');
                                }
                            }
                        }
                        
                        $this->eventsModel->deleteEventTag($EID);
                        foreach($data['tags'] as $tag){
                           if(!($this->eventsModel->eventtag($tag, $EID)))
                            {
                                die('Something went wrong when inserting the tags');
                            }
                        }

                        flash('reg_flash','Event Updated Successfully');
                        redirect('events/index');
                        
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('events/add', $data);
                }
            }else {
                $userID = $_SESSION['userID'];

                $event = $this->eventsModel->getEvent($EID);
                $tag = $this->eventsModel->eventTags($EID);
                $checkedExperts = $this->eventsModel->getEventExperts($EID);
                // $experts = $this->eventsModel->getResourcePerson();
                //print_r($tag);
                
                $data = [
                    'EID' => $EID,
                    'userID' => $userID,
                    'event' => $event,
                    'tag' => $tag,
                    'checkedExperts' => $checkedExperts,
                    // 'experts' => $experts,
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

        public function myEvents(){
            $userID = $_SESSION['userID'];

            $usertag = $this->eventsModel->getUserTag();
            $str = '';
            foreach($usertag as $tag) {
                $str = $str . 'eventtag.tag = "' . $tag->tag . '" OR ';
            }
            $str = substr($str, 0, -4);

            $currentDate = date('Y-m-d'); // get the current date in the format "YYYY-MM-DD"
            $events = $this->eventsModel->getMyEvents($userID, $currentDate); 
            $tags = $this->eventsModel->getEventTags();
            $resourcePerson = $this->eventsModel->getResourcePerson();
            $mod = $this->eventsModel->getMod();

            $data = [
                'events' => $events,
                'tags' => $tags,
                'resourcePerson' => $resourcePerson,
                // 'qualifications' => $qualifications,
                'usertag' => $usertag,
                'mod' => $mod,
            ];


            $this->view('events/myEvents', $data);
        }

        public function invite($EID){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');

                $userID = $_SESSION['userID'];

                if (isset($_POST['accept'])) {

                    if($this->eventsModel->acceptEvent($EID, $userID)){
                        flash('reg_flash','Event Accepted Successfully');
                        redirect('events/myEvents');
                    }else{
                        die('Something went wrong');
                    }
                }elseif (isset($_POST['reject'])) {

                    if($this->eventsModel->rejectEvent($EID, $userID)){
                        flash('reg_flash','Event Rejected');
                        redirect('events/eventRequests');
                    }else{
                        die('Something went wrong');
                    }
                }
            }
        }

        //get search results
        public function search() {
            $search = $_POST['keywords'];
            
            // print($str);
            if(isset($_SESSION['userID'])){
                $currentDate = date("Y-m-d");
                $events = $this->eventsModel->search($search, $currentDate);
            }
            
            // print_r($search);
            echo '<h3>Search Results for "'.$search.'"</h3><br>';
            foreach($events as $event){
                echo '<div class="question-div" style="margin-bottom: 3rem;">
                        <div class="info">
                            <div>
                                <p>TOPIC</p>
                                <h3>'.$event->title.'</h3>
                                <span>'.$event->content.'</span>
                            </div>';
                    echo '<div class="tags">
                            <label>Category</label><br>';
                            $tags = $this->eventsModel->eventTags($event->EID);
                            $tagArray = explode(",", $tags->tags);
                            foreach ($tagArray as $tag) :
                                    echo '<div class="tag">'.$tag.'</div>';
                            endforeach;
                    echo '</div>
                    </div>
                    <div class="content-display">
                        <div class="flex">
                            <button
                                class="read-more webinar">'.date("D, M j, Y", strtotime($event->date)).'</button>
                            <button
                                class="read-more webinar time">'.date("h:i A", strtotime($event->time)).'</button>
                        </div><br>
                        <p>Resource person</p>
                        <div class="flex">';
                            $resourcePerson = $this->eventsModel->getEventExperts($event->EID);
                            foreach ($resourcePerson as $RP) :
                                
                                    echo '<div class="qdp">
                                        <div>
                                            <img src="'.URLROOT.'/img/pfp/'.$RP->pfp.'" />
                                        </div>
                                        <div class="qdp-1" style="margin-left: 1rem;">
                                            <label>'.$RP->fName.' '.$RP->lName.'</label><br>
                                            <label class="qdp-1-2">'.$RP->qual.'</label>
                                        </div>
                                    </div>';
                                
                            endforeach;
                        echo '</div>
                        <button style="float:right" class="read-more attend">ATTEND</button>
                    </div>
                </div>';
            }        
        }

        //get pending search results
        public function searchPending() {
            $search = $_POST['keywords'];
            $userID = $_SESSION['userID'];
            
            if(isset($_SESSION['userID'])){
                $currentDate = date("Y-m-d");
                $events = $this->eventsModel->searchPending($search, $currentDate, $userID);
                $Etstatus = $this->eventsModel->eventstatus();
            }
            
            // print_r($search);
            echo '<h3>Search Results for "'.$search.'"</h3><br>';
            foreach($events as $event):
                echo '<div class="question-div" style="margin-bottom: 3rem;">
                        <div class="info">';
                            $dateString = $event->date;
                            $dateTime = new DateTime($dateString);

                            $year = $dateTime->format('Y');
                            $month = $dateTime->format('M');
                            $day = $dateTime->format('d');

                        echo'<div class="calander">
                                <div class="cal1">
                                    <label>'.$month.'</label>
                                </div>
                                <div class="cal2">
                                    <label>'.$day.'</label>
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
                    
                        echo '<div class="content-display">
                            <h3>'.$event->title.'</h3>
                            <p>'.$event->content.'</p><br>';
                            foreach($Etstatus as $eventstatus) :
                                if($eventstatus->EID == $event->EID) :
                                    echo '<label class="name-label">'.$eventstatus->fName.'" "'. $eventstatus->lName.'</label>';
                                    if($eventstatus->status == 'pending') :
                                        echo '<label class="time-label" style="background-color: lightgoldenrodyellow;color: black;">Pending</label>';
                                    else :
                                        echo '<label class="time-label">Accepted</label>';
                                    endif;
                                    echo '<br> <br>';
                                endif;
                            endforeach;
                            echo '<div class="date-count" style="margin-top: 1rem;">
                            <form action="'.URLROOT.'/events/editEvent/'.$event->EID.'">
                                <button type="submit" style="float:left" class="decline">Re-schedule</button>
                            </form>
                            </div>
                        </div>
                        <div class="appointment">
                            <label>'.$daysRemaining.' Days Remaining</label>
                        </div>
                </div>';
            endforeach;        
        }

        //filter by category
        public function filter() {
            
            $date = isset($_POST['publishDate']) ? $_POST['publishDate'] : '0';
            $hostEvent = isset($_POST['hostEvent']) ? $_POST['hostEvent'] : '0';

            // print_r($date);
            // print_r($hostEvent);
            if($date == '0' && $hostEvent == '0'){
                $this->index();
            }
            else{
                if($date != '0'){
                    if($date == 'Today'){
                        $date = 1;
                    }elseif($date == 'This week'){
                        $date = 7;
                    }elseif($date == 'This month'){
                        $date = 31;
                    }else{
                        $date = 365;
                    }
                }

                if($hostEvent != '0'){
                    if($hostEvent == 'past'){
                        $hostEvent = 0; //past
                    }else{
                        $hostEvent = 1; //upcoming
                    }
                }

                $now = date("Y-m-d");
                $start = $now . " 00:00:00";
                $end = date("Y-m-d", strtotime("+{$date} days")) . " 23:59:59";
                
                // print_r($date);

                if(isset($_SESSION['userID'])){
                    $usertag = $this->eventsModel->getUserTag();
                    $str = '';
                    foreach($usertag as $tag) {
                        $str = $str . 'eventtag.tag = "' . $tag->tag . '" OR ';
                    }
                    $str = substr($str, 0, -4);
                    $events = $this->eventsModel->filter($start,$end,$str);
                }

                $tags = $this->eventsModel->getEventTags();
                $resourcePerson = $this->eventsModel->getResourcePerson();
                    
                $data = [
                    'events' => $events,
                    'tags' => $tags,
                    'date' => $_POST['publishDate'],
                    'resourcePerson' => $resourcePerson,
                ];
                    
                // print_r($events);
                    
                $this->view('events/index', $data);
            }
        }

        public function filterPending(){
            $date = isset($_POST['publishDate']) ? $_POST['publishDate'] : '0';

            // print_r($date);
           
            if($date != '0'){
                if($date == 'Today'){
                    $date = 1;
                }elseif($date == 'This week'){
                    $date = 7;
                }elseif($date == 'This month'){
                    $date = 31;
                }else{
                    $date = 365;
                }

                $now = date("Y-m-d");
                $start = $now . " 00:00:00";
                $end = date("Y-m-d", strtotime("+{$date} days")) . " 23:59:59";
                
                // print_r($date);

                if(isset($_SESSION['userID'])){
                    $usertag = $this->eventsModel->getUserTag();
                    $str = '';
                    foreach($usertag as $tag) {
                        $str = $str . 'eventtag.tag = "' . $tag->tag . '" OR ';
                    }
                    $str = substr($str, 0, -4);
                    $events = $this->eventsModel->filterPending($start,$end,$str);
                }

                $tags = $this->eventsModel->getEventTags();
                $resourcePerson = $this->eventsModel->getResourcePerson();
                $eventstatus = $this->eventsModel->eventstatus();
                    
                $data = [
                    'pendingEvents' => $events,
                    'tags' => $tags,
                    'date' => $_POST['publishDate'],
                    'resourcePerson' => $resourcePerson,
                    'eventstatus' => $eventstatus,
                ];
                    
                // print_r($events);
                    
                $this->view('events/pending', $data);
            }else{
                $this->pending();
            }
        }
    }

?>