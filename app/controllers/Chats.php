<?php
    class Chats extends Controller {
        private $chatsModel;
        public function __construct() {
            $this->chatsModel = $this -> model('chatsM');
        }

        public function index(){
            $chats = $this->chatsModel->getuserChats($_SESSION['userID']);
            $chatID = array();
             //print_r($chats);

            foreach($chats as $chat){
                $chatID[] = $chat->chatID;
            }
            //print_r($chatID);
            
            $str = '';

            foreach($chatID as $id){
                $str .= $id . ',';
            }

            $str = rtrim($str, ',');

            //print($str);

            $users = $this->chatsModel->getChatUsers($str);

            //print_r($users);

            $tags = $this->chatsModel->getUserTags($_SESSION['userID']);
            $str1 = '';

            foreach($tags as $tag){
                $str1 = $str1 . 'tag = "' . $tag->tag . '" OR ';
            }
            

            $str1 = substr($str1, 0, -4);
            // print_r($str1);
            $addusers = $this->chatsModel->getUsers($str1);
            // print_r($addusers);

            $data = [
                'chats' => $chats,
                'users' => $users,
                'addusers' => $addusers,
                'title' => '',
                'Cusers' => '',
                'createdDate' => '',
                'createdBy' => '',
                'title_err' => '',
                'users_err' => '',
            ];
            $this->view('chats/index', $data);
        }

        //method to load messages using ajax
        public function show($chatID){
           // echo $chatID;
            $messages = $this->chatsModel->getChatMessages($chatID);
            
            //print_r($messages);
            
            foreach($messages as $msg){
               echo '<div class="qdp dlg-box">
                        <div>
                            <img src="'. URLROOT .'/img/pfp/' .$msg->pfp .'"/>
                        </div>
                        <div class="message">
                            <p>'.$msg -> content.'</p>
                            <label class="qdp-1-2">'.$msg->date.'</label>
                        </div>
                    </div>';
            }
            echo '<div id="chattyping"></div>';
            echo '<div class="send">
                                <input type="text" name="text" id="message" onkeyup="typing('.$_SESSION['firstName'].')" placeholder="Type Something..."/>
                                <button type="submit" class="submit-btn" id="send-btn"><img src="'. URLROOT .'/img/submit.png" onclick="send('.$chatID.','.date('Y-m-d H:i:s').','.$_SESSION['firstName'].')" class="submit"></button>
                            </div> ';
            
        }

        //method to reveal the chat
        public function showMembers($chatID){
            $users = $this->chatsModel->getChatUsers($chatID);
            $admin = $this->chatsModel->getChatAdmin($chatID);
            //print_r($users);
            echo '<div class="qdp">
                        <div>
                            <img src="'. URLROOT .'/img/pfp/' .$admin->pfp .'"/>
                        </div>
                        <div class="qdp-1">
                            <label>'.$admin->fName. " ". $admin->lName.'</label><br>
                        </div>
                    </div>';
            foreach($users as $user){
                echo '<div class="qdp">
                        <div>
                            <img src="'. URLROOT .'/img/pfp/' .$user->pfp .'"/>
                        </div>
                        <div class="qdp-1">
                            <label>'.$user->fName. " ". $user->lName.'</label><br>
                        </div>
                    </div>';
            }
            
        }

        //method to add a group chat
        public function create(){
            $chats = $this->chatsModel->getuserChats($_SESSION['userID']);
            $chatID = array();
             //print_r($chats);

            foreach($chats as $chat){
                $chatID[] = $chat->chatID;
            }
            //print_r($chatID);
            
            $str = '';

            foreach($chatID as $id){
                $str .= $id . ',';
            }

            $str = rtrim($str, ',');

            //print($str);

            $users = $this->chatsModel->getChatUsers($str);

            //print_r($users);

            $tags = $this->chatsModel->getUserTags($_SESSION['userID']);
            $str1 = '';

            foreach($tags as $tag){
                $str1 = $str1 . 'tag = "' . $tag->tag . '" OR ';
            }
            

            $str1 = substr($str1, 0, -4);
            // print_r($str1);
            $addusers = $this->chatsModel->getUsers($str1);
            // print_r($addusers);
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                
                $users = isset($_POST['Cusers']) ? $_POST['Cusers'] : '0';
                
                //print($users);
                
                //Input Data
                $data = [
                    'chats' => $chats,
                    'users' => $users,
                    'addusers' => $addusers,
                    'title' => trim($_POST['title']),
                    'Cusers' => $users,
                    'createdDate' => date('Y-m-d H:i:s'),
                    'createdBy' => $_SESSION['userID'],
                    'title_err' => '',
                    'users_err' => ''

                ];

                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please Enter a new title before creating a new chat';
                }

                // Validate users
                if($data['Cusers'] == '0') {
                    $data['users_err'] = 'Please Select One or More Users before creating a new chat';
                }else{
                    $data['Cusers'] = implode(',', $data['Cusers']);
                }


                // Make sure errors are empty
                if(empty($data['title_err']) && empty($data['users_err'])) {
                    // Adding the chat
                    if($this->chatsModel->create($data)) {
                            flash('reg_flash','Chat Group Added Successfully');
                            redirect('chats/index');
                        
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('Chats/index', $data);
                }
            }
            else {

                $data = [
                    'chats' => $chats,
                    'users' => $users,
                    'addusers' => $addusers,
                    'title' => '',
                    'Cusers' => '',
                    'createdDate' => '',
                    'createdBy' => '',
                    'title_err' => '',
                    'users_err' => '',
                ];
                $this->view('chats/index', $data);
            }
        }

        //method to send messages to the database
        public function send(){
            $_POST = json_decode(file_get_contents('php://input'), true);
            if(!isset($_POST)){
                $array['Status']= "Post not set";
                echo json_encode($array);
                die();
            }
            $message = $_POST['message'];
            $user = $_SESSION['Name'];
            $chatID = $_POST['chatID'];
            $date = $_POST['date'];
            
            $result = $this->chatsModel->send($chatID,$user,$message,$date);
          if($result) {
                // json encode sent
                $array['Status']= "Message sent";
                echo json_encode($array);
            } else {
            
                $array['Status']= "Message not sent";
                echo json_encode($array);
            }
            
                
        }


    }



?>