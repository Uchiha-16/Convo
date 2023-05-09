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

                        if(!(empty($data['newP']))){
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
            $myplaylist = $this->webinarModel->getPlaylists();
            //print_r($mywebinars);
            
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
            // my webinar by WID
            $webinar = $this->webinarModel->getmywebinarsbyID($WID);

            $old_filename = $webinar->thumbnail;  // Replace with the actual filename

            

            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');

                $tags = isset($_POST['tag']) ? $_POST['tag'] : '0';
                    if($tags != '0'){
                        $tags = implode(',', $tags);
                    }

                $playlist = isset($_POST['playlist']) ? $_POST['playlist'] : '0';
                    if($playlist != '0'){
                        $playlist = implode(',', $playlist);
                    }
                if($webinar->published == 0){
                    //VIDEO LINK
                    $link =  $_POST['link'];
                    $path = parse_url($link, PHP_URL_PATH); // extract the path component of the URL
                    $segments = explode('/', $path); // split the path into an array of segments
                    $last_segment = end($segments); // extract the last segment of the array

                    // Check if a new file has been uploaded
                    if($_FILES['thumbnail']['error'] == 0) {
                        // Generate a unique filename for the uploaded file
                        $new_filename = time() . '_' . $_FILES['thumbnail']['name'];
                            
                        // Move the uploaded file to its new location on the server and Validate thumbnail
                        if($_FILES['thumbnail']['size'] > 0){
                            if(uploadImage($_FILES['thumbnail']['tmp_name'], $new_filename, '/img/thumbnails/')) {
                                // Uploaded Successfully
                                // Delete the old profile picture file from the server
                                unlink('/img/thumbnails/' . $old_filename);
                            }else{
                                $_FILES['thumbnail_err'] = 'Something Went Wrong when uploading the image';
                            }
                        }else{
                            $_FILES['thumbnail_err'] = 'Please Select a Thumbnail';
                        }

                        $data = [
                            'WID' => $WID,
                            'title' => trim($_POST['title']),
                            'tag' => $tags,
                            'playlist' => $playlist,
                            'newP' => isset($_POST['newP']) ? trim($_POST['newP']) : '0',
                            'videolink' => $last_segment,
                            'thumbnail' => $new_filename,
                            'date' => date('Y-m-d H:i:s'),
                            'published' => isset($_POST['draft']) ? '0' : '1',
                            'title_err' => '',
                            'link_err' => '',
                            'thumbnail_err' => '',
                            'tag_err' => '',
                            'playlist_err' => '',
                            'webinarsPlaylist' => $webinarsPlaylist,
                        ];

                    } else {
                        // No new file was uploaded, so use the old filename
                        $data = [
                            'WID' => $WID,
                            'title' => trim($_POST['title']),
                            'tag' => $tags,
                            'playlist' => $playlist,
                            'newP' => isset($_POST['newP']) ? trim($_POST['newP']) : '0',
                            'videolink' => $last_segment,
                            'thumbnail' => $old_filename,
                            'date' => date('Y-m-d H:i:s'),
                            'published' => isset($_POST['draft']) ? '0' : '1',
                            'title_err' => '',
                            'link_err' => '',
                            'thumbnail_err' => '',
                            'tag_err' => '',
                            'playlist_err' => '',
                            'webinarsPlaylist' => $webinarsPlaylist,
                        ];
                       // print_r($data['tag']);
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
                }else{
                    $last_segment = $webinar->videolink;

                    $data = [
                        'WID' => $WID,
                        'title' => trim($_POST['title']),
                        'tag' => $tags,
                        'playlist' => $playlist,
                        'newP' => isset($_POST['newP']) ? trim($_POST['newP']) : '0',
                        'videolink' => $last_segment,
                        'thumbnail' => $old_filename,
                        'date' => date('Y-m-d H:i:s'),
                        'published' => '1',
                        'title_err' => '',
                        'link_err' => '',
                        'thumbnail_err' => '',
                        'tag_err' => '',
                        'playlist_err' => '',
                        'webinarsPlaylist' => $webinarsPlaylist,
                    ];
                }
                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please Enter Title';
                }

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One or More Tags';
                }else {
                    $data['tag'] = explode(',', $data['tag']);
                }

                // Validate Playlist
                if($data['playlist'] == '0' && empty($data['newP'])) {
                    $data['playlist_err'] = 'Please Select One or More Playlists';
                }else {
                    $data['playlist'] = explode(',', $data['playlist']);
                }

                // Make sure errors are empty
                if(empty($data['title_err']) && empty($data['link_err']) && empty($data['tag_err']) && empty($data['playlist_err'])) {
                    // EDIT Webinar
                    $this->webinarModel->deleteWebinarTag($WID);
                    if($this->webinarModel->editwebinar($data)) {
                        foreach($data['tag'] as $tag){
                            if(!($this->webinarModel->webinartag($tag, $WID))){
                                die('Something went wrong when inserting the tags');
                            }
                        }
                        
                        $this->webinarModel->deletePlaylist($WID);
                        if($data['playlist'] != '0'){
                            foreach($data['playlist'] as $playlist){
                                if(!($this->webinarModel->webinarPlaylist($playlist, $WID))){
                                    die('Something went wrong when Selecting the Playlist');
                                }
                            }
                        }   

                        if(!(empty($data['newP']))){
                            $this->webinarModel->webinarPlaylist($data['newP'], $WID);
                        }

                        flash('reg_flash','Webinar Updated Successfully!');
                        redirect('webinars/myWebinars');

                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    //echo ("Error");
                    $this->view('webinars/editWebinar', $data);
                }
            }else{
                    $tag = $this->webinarModel->getWebinarTagsbyID($WID);
                    $playlist = $this->webinarModel->getPlaylistbyID($WID);
                    $webinar = $this->webinarModel->getmywebinarsbyID($WID);
                    //print_r($webinar);
                    
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
            if(isset($_SESSION['userID'])){
                
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
                    $rp = $this->webinarModel->getExperts();
                $data = [
                    'webinars' => $webinars,
                    'tags' => $tags,
                    'usertag' => $usertag,
                    'expert' => $rp,
                ];
                $this->view('webinars/home', $data);
            }else{
                $webinars = $this->webinarModel->getwebinarsIndex();
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
                ];
                
                $this->view('webinars/home', $data);
            }
        }

        //get search results
        public function search() {
            $search = $_POST['keywords'];

            // print($str);
            if(isset($_SESSION['userID'])){
                $usertag = $this->webinarModel->getUserTag();
                $str = '';
                foreach($usertag as $tag) {
                    $str = $str . 'webinartag.tag = "' . $tag->tag . '" OR ';
                }
                $str = substr($str, 0, -4);

                $webinars = $this->webinarModel->search($search);
                $tags = $this->webinarModel->getWebinarTags();
            }else{
                $webinars = $this->webinarModel->searchIndex($search);
                $tags = $this->webinarModel->getQuestionTags();
            }
            
            // print_r($search);
            echo '<div>
                    <h3>Search Results for "'.$search.'"</h3>
                </div>
                <div></div>
                <div></div>';
            foreach($webinars as $webinar):
                echo '<div class="vid-slider">
                        <div class="vid-wrapper">
                            <div class="video vid item">
                                <div>
                                    <img src="'.URLROOT.'/img/thumbnails/'.$webinar->thumbnail.'" class="thumbnail">
                                </div>
                                <iframe style="display:none;" width="550" height="325" src="https://www.youtube.com/embed/'.$webinar->link.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div>
                                    <div class="qdp">
                                        <div style="height: 100%;">';
                                            if ($webinar->pfp != NULL) :
                                                echo '<img src="'.URLROOT.'/img/pfp/'.$webinar->pfp.'" />';
                                            else :
                                                echo '<img src="'.URLROOT.'/img/pfp/user.jpg" />';
                                            endif;
                                        echo '</div>
                                        <div class="video-content">
                                            <p class="text">'.$webinar->title.'</p>
                                            <div class="webinar-details">
                                                <div>
                                                    <label class="qdp-1-2">'.$webinar->date.'</label>
                                                </div>
                                                <div style="text-align: right;">
                                                    <span class="qdp-1-2 qdp-1-3">By '.$webinar->name.'</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            endforeach;
                
            echo '<!-- Popup -->
                <div class="video-popup">
                    <div class="iframe-wrapper">
                        <iframe width="800" height="500" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <span class="close-video"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                </div>';
        }

         //filter by category
        public function filter() {
            
            $date = isset($_POST['publishDate']) ? $_POST['publishDate'] : '0';
            $expert = isset($_POST['rp']) ? $_POST['rp'] : '0';

            // print_r($date);
           
            if($date == 0){
                $this->home();
            }else{
                if($date != 0){
                    if(in_array('last year', $date)){
                        $date = 12;
                    }elseif(in_array('last 6 months', $date)){
                        $date = 6;
                    }elseif(in_array('last 3 months', $date)){
                        $date = 3;
                    }else{
                        $date = 24;
                }
            }else{
                $date = 24;
            }
            
                // print_r($date);

                if(isset($_SESSION['userID'])){
                    $usertag = $this->webinarModel->getUserTag();
                    $str = '';
                    foreach($usertag as $tag) {
                        $str = $str . 'webinar.tag = "' . $tag->tag . '" OR ';
                    }
                    $str = substr($str, 0, -4);
    
                    $webinars = $this->webinarModel->filter($date);
                }
                

                $tags = $this->webinarModel->getWebinarTags();

                $data = [
                    'webinars' => $webinars,
                    'tags' => $tags,
                    'date' => $_POST['publishDate'],
                ];
                
                // print_r($questions);
                if(isset($_SESSION['userID'])){
                    
                        $this->view('webinars/home', $data);
                    
                } 
            }
        }
    }
?>