<?php
    class Users extends Controller  {
        private $userModel;
        public function __construct() {
            $this->userModel = $this->model('usersM');
           
        }

        public function about() {
            $data = [
                'title' => 'About Us'
            ];
            $this->view('pages/about', $data);
        }

        public function signup(){
                //Input Data
                $data = [];

                // Load view
                $this->view('users/signup', $data);
        }

        public function registerSeeker() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';

                //Input Data
                $data = [
                    'pfp' => ($_FILES['pfp']),
                    'pfp_name' => time().'_'.($_FILES['pfp']['name']),
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'email' => trim($_POST['email']),
                    'uname' => trim($_POST['uname']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'tag' => $tag,
                    'role' => 'seeker',
                    'fname_err' => '',
                    'lname_err' => '',
                    'email_err' => '',
                    'uname_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => ''
                ];


                // Validate Image
                if(uploadImage($data['pfp']['tmp_name'], $data['pfp_name'], '/img/pfp/')) {
                    $data['pfp'] = $data['pfp_name'];
                } else {
                    $data['pfp'] = 'user.jpg';
                }
                //validate each inputs
                // Validate fName
                if(empty($data['fname'])) {
                    $data['fname_err'] = 'Please enter First name';
                }

                // Validate fName
                if(empty($data['lname'])) {
                    $data['lname_err'] = 'Please enter Last name';
                }

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Username
                if(empty($data['uname'])) {
                    $data['uname_err'] = 'Please enter Username';
                } else {
                    // Check email
                    if($this->userModel->findUserByUsername($data['uname'])) {
                        $data['uname_err'] = 'Username is already taken';
                    }
                }

                // Validate Password

                $uppercase = preg_match('@[A-Z]@', $data['password']);
                $lowercase = preg_match('@[a-z]@', $data['password']);
                $number = preg_match('@[0-9]@', $data['password']);
                $specialChars = preg_match('@[^\w]@', $data['password']);
                   
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['password']) < 8) {
                    $data['password_err'] = 'Password should contain at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                }

                // Validate Confirm Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One or More Tags';
                }

                // Make sure errors are empty
                if(empty($data['fname_err']) && empty($data['email_err']) && empty($data['lname_err']) && empty($data['uname_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['tag_err'])) {
                    // Validated

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    
                    // Register User
                    if($this->userModel->register($data)) {
                        $LastID = $this->userModel->getLastID();
                        foreach($data['tag'] as $tag){
                           if(!($this->userModel->registerTag($tag, $LastID->userID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }
                            flash('reg_flash','New account created Successfully! (｡◕‿◕｡)');
                            redirect('Users/login');
                        
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    // Load view with errors
                    $this->view('users/registerSeeker', $data);

                }

            } else {
                // Initial data
                $data = [
                    'pfp' => '',
                    'pfp_name' => '',
                    'fname' => '',
                    'lname' => '',
                    'email' => '',
                    'uname' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'tag' => '',
                    'role' => '',
                    'fname_err' => '',
                    'lname_err' => '',
                    'email_err' => '',
                    'uname_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => '',
                ];

                // Load view
                $this->view('users/registerSeeker', $data);

            }
        }

        public function registerExpert(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';

                //Input Data
                $data = [
                    'pfp' => ($_FILES['pfp']),
                    'pfp_name' => time().'_'.($_FILES['pfp']['name']),
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'email' => trim($_POST['email']),
                    'uname' => trim($_POST['uname']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'tag' => $tag,
                    'linkedin' => trim($_POST['linkedin']),
                    'qualifications' => trim($_POST['qualifications']),
                    'role' => 'expert',
                    'fname_err' => '',
                    'lname_err' => '',
                    'email_err' => '',
                    'uname_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => '',
                    'linkedin_err' => '',
                    'qualifications_err' => ''
                ];


                // Validate Image
                if(uploadImage($data['pfp']['tmp_name'], $data['pfp_name'], '/img/pfp/')) {
                    $data['pfp'] = $data['pfp_name'];
                } else {
                    $data['pfp'] = 'user.jpg';
                }
                //validate each inputs
                // Validate fName
                if(empty($data['fname'])) {
                    $data['fname_err'] = 'Please enter First name';
                }

                // Validate fName
                if(empty($data['lname'])) {
                    $data['lname_err'] = 'Please enter Last name';
                }

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Username
                if(empty($data['uname'])) {
                    $data['uname_err'] = 'Please enter Username';
                } else {
                    // Check email
                    if($this->userModel->findUserByUsername($data['uname'])) {
                        $data['uname_err'] = 'Username is already taken';
                    }
                }

                // Validate Password

                $uppercase = preg_match('@[A-Z]@', $data['password']);
                $lowercase = preg_match('@[a-z]@', $data['password']);
                $number = preg_match('@[0-9]@', $data['password']);
                $specialChars = preg_match('@[^\w]@', $data['password']);
                   
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['password']) < 8) {
                    $data['password_err'] = 'Password should contain at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                }

                // Validate Confirm Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One or More Tags';
                }

                // Validate LinkedIn
                if(empty($data['linkedin'])) {
                    $data['linkedin_err'] = 'Please enter LinkedIn';
                }

                // Validate Qualifications
                if(empty($data['qualifications'])) {
                    $data['qualifications_err'] = 'Please enter Qualifications';
                }

                // Make sure errors are empty
                if(empty($data['fname_err']) && empty($data['email_err']) && empty($data['lname_err']) && empty($data['uname_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['tag_err']) && empty($data['linkedin_err']) && empty($data['qualifications_err'])) {
                    // Validated

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    
                    // Register User
                    if($this->userModel->register($data)) {
                        $LastID = $this->userModel->getLastID();
                        foreach($data['tag'] as $tag){
                           if(!($this->userModel->registerTag($tag, $LastID->userID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }
                            flash('reg_flash','New account created Successfully! (｡◕‿◕｡)');
                            redirect('Users/login');
                        
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    // Load view with errors
                    $this->view('users/registerExpert', $data);

                }

            } else {
                // Initial data
                $data = [
                    'pfp' => '',
                    'pfp_name' => '',
                    'fname' => '',
                    'lname' => '',
                    'email' => '',
                    'uname' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'tag' => '',
                    'linkedin' => '',
                    'qualifications' => '',
                    'role' => '',
                    'fname_err' => '',
                    'lname_err' => '',
                    'email_err' => '',
                    'uname_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => '',
                    'linkedin_err' => '',
                    'qualifications_err' => ''
                ];

                // Load view
                $this->view('users/registerExpert', $data);

            }
        }

        public function registerCompany(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';

                //Input Data
                $data = [
                    'pfp' => ($_FILES['pfp']),
                    'pfp_name' => time().'_'.($_FILES['pfp']['name']),
                    'fname' => trim($_POST['fname']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'tag' => $tag,
                    'bio' => trim($_POST['bio']),
                    'weblink' => trim($_POST['weblink']),
                    'type' => trim($_POST['type']),
                    'contact' => trim($_POST['contact']),
                    'role' => 'company',
                    'fname_err' => '',
                    'email_err' => '',
                    'uname_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => '',
                    'bio_err' => '',
                    'weblink_err' => '',
                    'type_err' => '',
                    'contact_err' => ''
                ];


                // Validate Image
                if(uploadImage($data['pfp']['tmp_name'], $data['pfp_name'], '/img/pfp/')) {
                    $data['pfp'] = $data['pfp_name'];
                } else {
                    $data['pfp'] = 'user.jpg';
                }
                //validate each inputs
                // Validate fName
                if(empty($data['fname'])) {
                    $data['fname_err'] = 'Please enter Company name';
                }

                // Validate fName
                if(empty($data['lname'])) {
                    $data['lname_err'] = 'Please enter Last name';
                }

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Username
                if(empty($data['uname'])) {
                    $data['uname_err'] = 'Please enter Username';
                } else {
                    // Check email
                    if($this->userModel->findUserByUsername($data['uname'])) {
                        $data['uname_err'] = 'Username is already taken';
                    }
                }

                // Validate Password

                $uppercase = preg_match('@[A-Z]@', $data['password']);
                $lowercase = preg_match('@[a-z]@', $data['password']);
                $number = preg_match('@[0-9]@', $data['password']);
                $specialChars = preg_match('@[^\w]@', $data['password']);
                   
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['password']) < 8) {
                    $data['password_err'] = 'Password should contain at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                }

                // Validate Confirm Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                //Validate bio
                if(empty($data['bio'])) {
                    $data['bio_err'] = 'Please enter bio';
                }

                //Validate weblink
                if(empty($data['weblink'])) {
                    $data['weblink_err'] = 'Please enter weblink';
                }

                //Validate type
                if(empty($data['type'])) {
                    $data['type_err'] = 'Please enter type';
                }

                //Validate contact
                if(empty($data['contact'])) {
                    $data['contact_err'] = 'Please enter contact';
                }

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One or More Tags';
                }

                // Make sure errors are empty
                if(empty($data['fname_err']) && empty($data['email_err']) && empty($data['lname_err']) && empty($data['uname_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['tag_err']) && empty($data['bio_err']) && empty($data['weblink_err']) && empty($data['type_err']) && empty($data['contact_err'])) {
                    // Validated

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    
                    // Register User
                    if($this->userModel->register($data)) {
                        $LastID = $this->userModel->getLastID();
                        foreach($data['tag'] as $tag){
                           if(!($this->userModel->registerTag($tag, $LastID->userID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }
                            flash('reg_flash','New account created Successfully! (｡◕‿◕｡)');
                            redirect('Users/login');
                        
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    // Load view with errors
                    $this->view('users/registerCompany', $data);

                }

            } else {
                // Initial data
                $data = [
                    'pfp' => '',
                    'pfp_name' => '',
                    'fname' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'tag' => '',
                    'bio' => '',
                    'weblink' => '',
                    'contact' => '',
                    'type' => '',
                    'role' => '',
                    'fname_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => '',
                    'bio_err' => '',
                    'weblink_err' => '',
                    'type_err' => '',
                    'contact_err' => ''
                ];

                // Load view
                $this->view('users/registerCompany', $data);

            }
        }

        public function login() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Form is submitting

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'uname' => trim($_POST['uname']),
                    'password' => trim($_POST['password']),
                    'uname_err' => '',
                    'password_err' => ''
                ];

                // Validate Username
                if(empty($data['uname'])) {
                    $data['uname_err'] = 'Please enter Username';
                }
                else {
                    // Check email
                    if($this->userModel->findUserByUsername($data['uname'])) {
                        // User found
                    } else {
                        $data['uname_err'] = 'User not Found';
                    }
                }

                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    //log the user
                    $loggedUser = $this->userModel->login($data['uname'], $data['password']);
                    
                    if($loggedUser) {
                       // Create Session
                        $this->createUserSession($loggedUser);

                        // Role
                        if($loggedUser->role == 'expert'){
                            redirect('pages/expert');
                        } elseif($loggedUser->role == 'seeker'){
                            redirect('pages/seeker');
                        }elseif($loggedUser->role == 'seeker/mod'){
                            redirect('pages/seeker');
                        }elseif($loggedUser->role == 'expert/mod'){
                            redirect('pages/expert');
                        }elseif($loggedUser->role == 'premium'){ //PREMIUM DANNOOOOOOOOO !!!!!!!!!!!!!!!
                            redirect('pages/seeker');
                        }else {
                            redirect('pages/admin');
                        }

                    } else {
                        $data['password_err'] = 'Password  incorrect. Try Again';

                        $this->view('users/login', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('users/login', $data);
                }

            } else {
                $data = [
                    'uname' => '',
                    'password' => '',
                    'uname_err' => '',
                    'password_err' => ''
                ];

                // Load view
                $this->view('users/login', $data);
            }
            
        }

        public function createUserSession($user) {
            $_SESSION['userID'] = $user->userID;
            $_SESSION['email'] = $user->email;
            $_SESSION['uname'] = $user->uname;
            $_SESSION['firstName'] = $user->firstName;
            $_SESSION['lastName'] = $user->lastName;
            $_SESSION['pfp'] = $user->pfp;
            $_SESSION['role'] = $user->role;
        }

        public function logout() {
            unset($_SESSION['userID']);
            unset($_SESSION['email']);
            unset($_SESSION['uname']);
            unset($_SESSION['firstName']);
            unset($_SESSION['lastName']);
            unset($_SESSION['pfp']);
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn() {
            if(isset($_SESSION['userID'])) {
                return true;
            } else {
                return false;
            }
        }

    }
?>