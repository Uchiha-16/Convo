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

            $data = [
                'chats' => $chats,
                'users' => $users
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

        //method to add chat group
        public function addChatGroup(){
            $data = [];
            $this->view('chats/addChatGroup', $data);
        }



    }



?>