<?php
    class Events extends Controller {
        private $eventsModel;
        public function __construct() {
            $this->eventsModel = $this -> model('eventsM');
        }

        public function add(){
            $data = [];
            $this->view('events/add', $data);
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

        
    }

?>