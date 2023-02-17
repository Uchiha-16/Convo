<?php
    class Users extends Controller  {
        public function __construct() {
            $this->userModel = $this->model('usersM');
           
        }

        public function register() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';

                //Input Data
                $data = [
                    // 'pfp' => trim($_FILES['pfp']),
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'email' => trim($_POST['email']),
                    'uname' => trim($_POST['uname']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'tag' => $tag,
                    'fname_err' => '',
                    'lname_err' => '',
                    'email_err' => '',
                    'uname_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => ''
                ];

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
                    $this->view('users/register', $data);

                }

            } else {
                // Initial data
                $data = [
                    'fname' => '',
                    'lname' => '',
                    'email' => '',
                    'uname' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'tag' => '',
                    'fname_err' => '',
                    'lname_err' => '',
                    'email_err' => '',
                    'uname_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => '',
                ];

                // Load view
                $this->view('users/register', $data);

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
                        redirect('pages/seeker');
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
            // $_SESSION['pfp'] = $user->pfp;
            redirect('pages/seeker');
        }

        public function logout() {
            unset($_SESSION['userID']);
            unset($_SESSION['email']);
            unset($_SESSION['uname']);
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