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

            $qual = $this->eventsModel->getQualification();

            $resourcePerson = $this->eventsModel->getResourcePerson();
            
            $data = [
                'events' => $events,
                'tags' => $tags,
                'resourcePerson' => $resourcePerson,
                'usertag' => $usertag,
            ];


            $this->view('events/index', $data);
        }
    }

?>