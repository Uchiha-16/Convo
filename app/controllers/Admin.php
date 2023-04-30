<?php
    class Admin extends Controller {
        public function __construct() {
            $this->adminModel = $this -> model('adminM');
        }

        public function index(){
        
            if(isset($_GET['role']) && !empty($_GET['role'])) {
                $users = $this->adminModel->getUsersByRole($_GET['role']);
            } else{
                // unset($_GET['role']);
                $users = $this->adminModel->getAllUsers();
            }

            

            $complaints = $this->adminModel->getAllComplaints();
            
            //loop through the complaints and retrieve relevant user data
            foreach($complaints as &$complaint){
                $userID= $complaint->userID;
                //retrieve user data for the complaint
                $user = $this->adminModel->getUserById($userID);

                //check visibility and update user data accordingly
                if ($complaint -> visibility=='anonymus'){
                    $user -> uname = 'Anonymus';
                    $user -> role = '';
                }

                //add user data to the complaint array
                $complaint->uname=$user->uname;
                $complaint->role= $user->role;
            }

            $data=[
                'users' =>$users,
                'complaints' =>$complaints
            ];

            $this->view('admin/index',$data);

           
        }

        public function add(){
            $data = [];
            $this->view('admin/index', $data);
        }

    }

?>