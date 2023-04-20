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

            $eid = array();
                for($i = 0; $i < count($events); $i++) {
                    $eid[$i] = $events[$i]->eventID;
                }
    
                $str2 = '';
    
                foreach($eid as $id) {
                    $str2 = $str2 . 'eventID = "' . $id . '" OR ';
                }
    
                $str2 = substr($str2, 0, -4);
                
                $tags = $this->eventsModel->getEventTags($str2);

                //$resourcePerson = $this->eventsModel->getResourcePerson();

            $data = [
                'events' => $events,
                'tags' => $tags,
                'usertag' => $usertag,
                // 'resourcePerson' => $resourcePerson
            ];

            $this->view('events/index', $data);
        }
    }

?>