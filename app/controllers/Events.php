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

        //get search results
        public function search() {
            $search = $_POST['keywords'];
            
            // print($str);
            if(isset($_SESSION['userID'])){
                $events = $this->eventsModel->search($search);
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
                                if ($RP->EID == $event->EID) :
                                    echo '<div class="qdp">
                                        <div>
                                            <img src="'.URLROOT.'/img/pfp/'.$RP->pfp.'" />
                                        </div>
                                        <div class="qdp-1" style="margin-left: 1rem;">
                                            <label>'.$RP->name.'</label><br>
                                            <label class="qdp-1-2">'.$RP->qual.'</label>
                                        </div>
                                    </div>';
                                endif;
                            endforeach;
                        echo '</div>
                        <button style="float:right" class="read-more attend">ATTEND</button>
                    </div>
                </div>';
            }        
        }

        //filter by category
        // public function filter() {
            
        //     $date = isset($_POST['publishDate']) ? $_POST['publishDate'] : '0';
        //     $QA = isset($_POST['QA']) ? $_POST['QA'] : '0';
        //     $rating = isset($_POST['rating']) ? $_POST['rating'] : '0';

        //     // print_r($date);
        //     // print_r($QA);
        //     // print_r($rating);
           
        //     if($date == 0 && $QA == 0 && $rating == 0){
        //         if(isset($_SESSION['userID'])){
        //             if($_SESSION['role'] == 'seeker'){
        //                 $this->seeker();
        //             }elseif($_SESSION['role'] == 'expert'){
        //                 $this->expert();
        //             }elseif($_SESSION['role'] == 'company'){
        //                 $this->company();
        //             }    
        //         }else{
        //             $this->index();
        //         }
                
        //     }else{
        //         if($date != 0){
        //             if(in_array('last year', $date)){
        //                 $date = 12;
        //             }elseif(in_array('last 6 months', $date)){
        //                 $date = 6;
        //             }elseif(in_array('last 3 months', $date)){
        //                 $date = 3;
        //             }else{
        //                 $date = 24;
        //         }
        //     }else{
        //         $date = 24;
        //     }
            
        //     if($rating != 0){
        //         if(in_array(5,$rating)){
        //             $rating = 5;
        //         }elseif(in_array(4,$rating)){
        //             $rating = 4;
        //         }
        //         elseif(in_array(3,$rating)){
        //             $rating = 3;
        //         }
        //         elseif(in_array(2,$rating)){
        //             $rating = 2;
        //         }
        //         elseif(in_array(1,$rating)){
        //             $rating = 1;
        //         }else{
        //             $rating = 5;
        //         }
        //     }else{
        //         $rating = 5;
        //     }
        //     if($QA != 0){
        //         if(in_array('Answered',$QA)){
        //             $QA1 = 1;
        //             $QA2 = 1000;
        //             if((in_array('Not Answered',$QA))){
        //                 $QA1 = 0;
        //             }
        //         }   
        //         elseif(in_array('Not Answered',$QA)){
        //             $QA1 = 0;
        //             $QA2 = 0;
    
        //         }else{
        //             $QA1 = 0;
        //             $QA2 = 1000;
        //         }
        //     }else{
        //         $QA1 = 0;
        //         $QA2 = 1000;
        //     }
    
        //         // print_r($date);
        //         // print_r($QA1);
        //         // print_r($QA2);
        //         // print_r($rating);

        //         if(isset($_SESSION['userID'])){
        //             $usertag = $this->pagesM->getUserTag();

        //             $str = '';
    
        //             foreach($usertag as $tag) {
        //                 $str = $str . 'questiontag.tag = "' . $tag->tag . '" OR ';
    
        //             }
    
        //             $str = substr($str, 0, -4);
    
        //             $questions = $this->pagesM->filter($date,$QA1,$QA2,$rating,$str);
        //         }else{
        //             $questions = $this->pagesM->filterIndex($date,$QA1,$QA2,$rating);
        //         }
                

        //         $tags = $this->pagesM->getQuestionTags();

        //         $count = array();
        //         $c = 0;
        //         foreach($questions as $question) {
        //             $count[$c] = $this->pagesM->answerCount($question->QID);
        //             $count[$c]->QID = $question->QID;
        //             $c++;
        //         }

                
        //         $data = [
        //             'questions' => $questions,
        //             'tags' => $tags,
        //             'count' => $count,
        //             'date' => $_POST['publishDate'],
        //             'rating' => $_POST['rating'],
        //             'QA' => $_POST['QA']
        //         ];
                
        //         // print_r($questions);
        //         if(isset($_SESSION['userID'])){
        //             if($_SESSION['role'] == 'seeker'){
        //                 $this->view('pages/seeker', $data);
        //             }
        //             elseif($_SESSION['role'] == 'expert'){
        //                 $this->view('pages/expert', $data);
        //             }else{
        //                 $this->view('pages/company', $data);
        //             }
        //         }else{
        //             $this->view('pages/index', $data);
        //         }

                    
        //     }
        // }
    }

?>