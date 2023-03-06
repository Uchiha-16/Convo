<?php
    class Webinars extends Controller {
        public function __construct() {
            $this->webinarModel = $this -> model('webinarM');
        }

        public function add(){

            // my playlists
            $webinarsPlaylist = $this->webinarModel->getPlaylist();
            //$this->view('webinars/add', $data);
            // Form is submitting
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');

                //TAG
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';

                //PLAYLIST
                $playlist = isset($_POST['playlist']) ? $_POST['playlist'] : '0';

                //VIDEO LINK
                $link = $_POST['link'];
                $path = parse_url($link, PHP_URL_PATH); // extract the path component of the URL
                $segments = explode('/', $path); // split the path into an array of segments
                $last_segment = end($segments); // extract the last segment of the array
                //Input Data
                $data = [
                    'title' => trim($_POST['title']),
                    'tag' => $tag,
                    'playlist' => $playlist,
                    'newP' => isset($_POST['newP']) ? trim($_POST['newP']) : '',
                    'videolink' => $last_segment,
                    'thumbnail' => ($_FILES['thumbnail']),
                    'thumbnail_name' => time().'_'.($_FILES['thumbnail']['name']),
                    'date' => date('Y-m-d H:i:s'),
                    'title_err' => '',
                    'link_err' => '',
                    'thumbnail_err' => '',
                    'tag_err' => '',
                    'playlist_err' => '',
                ];
                
                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please Enter Title';
                }

                //Validate thumbnail
                if($data['thumbnail']['size'] > 0){
                    if(uploadImage($data['thumbnail']['tmp_name'], $data['thumbnail_name'], '/img/thumbnails/')) {
                        //done
                    }else{
                        $data['thumbnail_err'] = 'Something Went Wrong when uploading the image';
                    }
                }else{
                    $data['thumbnail_name'] = null;
                }

                // Validate videolink
                if(empty($data['videolink'])) {
                    $data['link_err'] = 'Please Enter Video Link';
                }else{
                    $link = trim($link);
          
                    // Check if the input matches the expected format of a YouTube video URL
                    if(!(preg_match('/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/(watch\?v=)?([a-zA-Z0-9_-]{11})|(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/embed\/([a-zA-Z0-9_-]{11})/', $link))) {
                        $data['link_err'] = 'Please Enter Valid Video Link';
                    }
                }

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One or More Tags';
                }

                // Validate Playlist
                if($data['playlist'] == '0' && empty($data['newP'])) {
                    $data['playlist_err'] = 'Please Select One or More Playlists';
                }

                // Make sure errors are empty
                if(empty($data['title_err']) && empty($data['link_err']) && empty($data['tag_err']) && empty($data['thumbnail_err']) && empty($data['playlist_err'])) {
                    // Adding Webinar
                    if($this->webinarModel->add($data)) {
                        $LastID = $this->webinarModel->getLastID();
                        foreach($data['tag'] as $tag){
                           if(!($this->webinarModel->webinarTag($tag, $LastID->webinarID)))
                            {
                                die('Something went wrong when inserting the tags');
                            }
                        }
                        
                        if($data['playlist'] != '0'){
                            foreach($data['playlist'] as $playlist){
                                if(!($this->webinarModel->webinarPlaylist($playlist, $LastID->webinarID))){
                                        die('Something went wrong when Selecting the Playlist');
                                }
                            }
                        }
                        
                            flash('reg_flash','Webinar Added Successfully');
                            redirect('webinars/home');

                        if(isset($data['newP'])){
                            $this->webinarModel->webinarPlaylist($data['newP'], $LastID->webinarID);
                        }

                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('webinars/add', $data);
                }
            }
            else {
                $data = [
                    'title' => '',
                    'tag' => '',
                    'playlist' => '',
                    'videolink' => '',
                    'thumbnail' => '',
                    'date' => '',  
                    'title_err' => '',
                    'link_err' => '',
                    'thumbnail_err' => '',
                    'tag_err' => '',
                    'playlist_err' => '',
                    'webinarsPlaylist' => $webinarsPlaylist,
                ];
                $this->view('webinars/add', $data);
            }

            
        }

        

        public function myWebinars(){
            $webinars = $this->webinarModel->getmywebinars();
            
            $data = [
                'webinars' => $webinars,
            ];
            
            $this->view('webinars/myWebinars', $data);
        }

        public function home(){
            $webinars = $this->webinarModel->getwebinars();
            
            $data = [
                'webinars' => $webinars,
            ];
            
            $this->view('webinars/home', $data);
        }
    }
?>