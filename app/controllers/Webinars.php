<?php
    class Webinars extends Controller {
        private $webinarModel;
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
                    'newP' => isset($_POST['newP']) ? trim($_POST['newP']) : '0',
                    'videolink' => $last_segment,
                    'thumbnail' => ($_FILES['thumbnail']),
                    'thumbnail_name' => time().'_'.($_FILES['thumbnail']['name']),
                    'date' => date('Y-m-d H:i:s'),
                    'published' => isset($_POST['submit']) ? '1' : '0',
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

                        if($data['newP'] != '0'){
                            $this->webinarModel->webinarPlaylist($data['newP'], $LastID->webinarID);
                        }

                        flash('reg_flash','Webinar Added Successfully!');
                        redirect('webinars/home');

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
                    'published' => '',
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
            $mywebinars = $this->webinarModel->getmywebinars();
            $myplaylist = $this->webinarModel->getplaylist();
            
            $data = [
                'mywebinars' => $mywebinars,
                'myplaylist' => $myplaylist

            ];
            
            $this->view('webinars/myWebinars', $data);
        }

        public function delete($WID) {
                if($this->webinarModel->delete($WID)) {
                    flash('reg_flash', 'Webinar Deleted Successfully!');
                    redirect('webinars/myWebinars');
                } else {
                    die('Something went wrong');
                    redirect('Webinars/myWebinars');
                }
        }
                
        public function edit($WID){
            // my playlists
            $webinarsPlaylist = $this->webinarModel->getPlaylist();

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');

                //tags
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
                    'WID' => $WID,
                    'title' => trim($_POST['title']),
                    'tag' => $tag,
                    'playlist' => $playlist,
                    'newP' => isset($_POST['newP']) ? trim($_POST['newP']) : '0',
                    'videolink' => $last_segment,
                    'thumbnail' => ($_FILES['thumbnail']),
                    'thumbnail_name' => time().'_'.($_FILES['thumbnail']['name']),
                    'date' => date('Y-m-d H:i:s'),
                    'published' => isset($_POST['submit']) ? '1' : '0',
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
                    $data['thumbnail_name'] = $_FILES['thumbnail']['name'];
                    uploadImage($data['thumbnail']['tmp_name'], $data['thumbnail_name'], '/img/thumbnails/');
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

                        if($data['newP'] != '0'){
                            $this->webinarModel->webinarPlaylist($data['newP'], $LastID->webinarID);
                        }

                        flash('reg_flash','Webinar Updated Successfully!');
                        redirect('webinars/myWebinars');

                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('webinars/editWebinar', $data);
                }
            }
            else {
                $tag = $this->webinarModel->getWebinarTagsbyID($WID);
                $playlist = $this->webinarModel->getPlaylistbyID($WID);
                $webinar = $this->webinarModel->getmywebinarsbyID($WID);
                
                $data = [
                    'WID' => $WID,
                    'title' => $webinar->title,
                    'tag' => $tag->tags,
                    'playlist' => $playlist->playlistName,
                    'videolink' => $webinar->videolink,
                    'thumbnail' => $webinar->thumbnail,
                    'date' => date('Y-m-d H:i:s'),
                    'published' => $webinar->published,
                    'title_err' => '',
                    'link_err' => '',
                    'thumbnail_err' => '',
                    'tag_err' => '',
                    'playlist_err' => '',
                    'webinarsPlaylist' => $webinarsPlaylist,
                ];
                
                $this->view('webinars/editWebinar', $data);
            }
        }

        public function home(){
            $usertag = $this->webinarModel->getUserTag();

            $str = '';
    
            foreach($usertag as $tag) {
                $str = $str . 'webinartag.tag = "' . $tag->tag . '" OR ';
    
            }
    
            $str = substr($str, 0, -4);


            $webinars = $this->webinarModel->getwebinars($str);
            $wid = array();
                for($i = 0; $i < count($webinars); $i++) {
                    $wid[$i] = $webinars[$i]->webinarID;
                }
    
                $str2 = '';
    
                foreach($wid as $id) {
                    $str2 = $str2 . 'webinarID = "' . $id . '" OR ';
                }
    
                $str2 = substr($str2, 0, -4);
                
                $tags = $this->webinarModel->getWebinarTags($str2);

            
            $data = [
                'webinars' => $webinars,
                'tags' => $tags,
                'usertag' => $usertag
            ];
            
            $this->view('webinars/home', $data);
        }
    }
?>