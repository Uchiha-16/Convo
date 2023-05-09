<?php
    class Profiles extends Controller {
        private $profilesModel;
        public function __construct() {
            $this->profilesModel = $this->model('profilesM');
        }

        public function seeker(){
            $profile = $this->profilesModel->getprofile();
            $question = $this->profilesModel->getQuestions();
            $skilltest = $this->profilesModel->getSkilltest();
            $chatgroups = $this->profilesModel->chatgroups();
            $events = $this->profilesModel->getAttendEvents($_SESSION['userID']);
            $eventAttend = [];
            $i = 0;
            foreach($events as $event){
                $eventAttend[$i] = $this->profilesModel->getEvent($event->eventID);
                $i++;
            }
            // print_r($eventAttend);
            $resourcePerson = $this->profilesModel->getResourcePerson();

            $avgscore = [];
            foreach($skilltest as $sk){
                $avgscore[] = $sk->score;
            }
            if(count($avgscore) == 0){
                $avgscore = 0;
            }else{
                $avgscore = array_sum($avgscore)/count($avgscore);
            }
            
            //$avgscore = array_sum($avgscore)/count($avgscore);
            //$avgscore = 70%

            //Calendar
            $current_month = date("m");
            $current_year = date("Y");
            $consultations = $this->profilesModel->getConsultDates($_SESSION['userID'], $current_month, $current_year);
            $consultdates = [];
            foreach($consultations as $consultation){
                $consultdates[] = date("d", strtotime($consultation->date));
            }
            $data = [
                'profile' => $profile,
                'question' => $question,
                'skilltest' => $skilltest,
                'avgscore' => $avgscore,
                'chatgroups' => $chatgroups,
                'events' => $eventAttend,
                'resourcePerson' => $resourcePerson,
                'monthlyConsultations' => $consultations,
                'consultdates' => $consultdates,
                
            ];
            // if(isset($_POST['Datevalue'])){
            //                 $Datevalue  = $_POST['Datevalue'];
            //                 echo '<script>alert("' . $Datevalue . '");</script>';
            //                 echo '<div class="hover-box">
            //                         <h4>Consultation</h4>
            //                         <p>with Varsha Wijethunge</p>
            //                         <span>@ 4.00pm</span>
            //                     </div>';
            //             }
            $this->view('profiles/seeker', $data);
        }

        public function expert(){
            $profile = $this->profilesModel->getprofile();
            $question = $this->profilesModel->getQuestions();
            $skilltest = $this->profilesModel->getSkilltest();
            $chatgroups = $this->profilesModel->chatgroups();
            $events = $this->profilesModel->getAttendEvents($_SESSION['userID']);
            $eventAttend = [];
            $i = 0;
            foreach($events as $event){
                $eventAttend[$i] = $this->profilesModel->getEvent($event->eventID);
                $i++;
            }
            // print_r($eventAttend);
            $resourcePerson = $this->profilesModel->getResourcePerson();

            //print_r($skilltest);
            $avgscore = [];
            foreach($skilltest as $sk){
                $avgscore[] = $sk->score;
            }
            if(count($avgscore) == 0){
                $avgscore = 0;
            }else{
                $avgscore = array_sum($avgscore)/count($avgscore);
            }
            
            //Calendar
            $current_month = date("m");
            $current_year = date("Y");
            $consultations = $this->profilesModel->getConsultDates($_SESSION['userID'], $current_month, $current_year);
            $consultdates = [];
            foreach($consultations as $consultation){
                $consultdates[] = date("d", strtotime($consultation->date));
            }
            $data = [
                'profile' => $profile,
                'question' => $question,
                'skilltest' => $skilltest,
                'avgscore' => $avgscore,
                'chatgroups' => $chatgroups,
                'events' => $eventAttend,
                'resourcePerson' => $resourcePerson,
                'monthlyConsultations' => $consultations,
                'consultdates' => $consultdates,
                
            ];
            // if(isset($_POST['Datevalue'])){
            //                 $Datevalue  = $_POST['Datevalue'];
            //                 echo '<script>alert("' . $Datevalue . '");</script>';
            //                 echo '<div class="hover-box">
            //                         <h4>Consultation</h4>
            //                         <p>with Varsha Wijethunge</p>
            //                         <span>@ 4.00pm</span>
            //                     </div>';
            //             }
            $this->view('profiles/expert', $data);
        }

        public function company(){
            $data = [];
            $this->view('profiles/company', $data);
        }

        public function admin(){
            $data = [];
            $this->view('profiles/admin', $data);
        }

        public function seekeredit(){
            $profile = $this->profilesModel->getprofile();
           
            $old_filename = $profile->pfp;
            
            
            $tags = $this->profilesModel->getUsertags();
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                // Check if a new file has been uploaded
                if($_FILES['pfp']['error'] == 0) {
                    // Generate a unique filename for the uploaded file
                    $new_filename = time() . '_' . $_FILES['pfp']['name'];
                        
                    // Move the uploaded file to its new location on the server and Validate thumbnail
                    if($_FILES['pfp']['size'] > 0){
                        if(uploadImage($_FILES['pfp']['tmp_name'], $new_filename, '/img/pfp/')) {
                            // Uploaded Successfully
                            // Delete the old profile picture file from the server
                            unlink('/img/pfp/' . $old_filename);
                        }else{
                            $_FILES['pfp_err'] = 'Something Went Wrong when uploading the image';
                        }
                    }else{
                        $_FILES['pfp_err'] = 'Please Select a Profile Picture';
                    }

                //Input Data
                $data = [
                    'profile' => $profile,
                    'tags' => $tags->tags,
                    'pfp' => $new_filename,
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'email' => trim($_POST['email']),
                    'uname' => trim($_POST['uname']),
                    'oldpassword' => trim($_POST['passwordold']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'tag' => $tag,
                    'fname_err' => '',
                    'lname_err' => '',
                    'email_err' => '',
                    'uname_err' => '',
                    'oldpassword_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => '',
                    
                ];
            }else{
                //Input Data
                $data = [
                    'profile' => $profile,
                    'tags' => $tags->tags,
                    'pfp' => $old_filename,
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'email' => trim($_POST['email']),
                    'uname' => trim($_POST['uname']),
                    'oldpassword' => trim($_POST['passwordold']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'tag' => $tag,
                    'fname_err' => '',
                    'lname_err' => '',
                    'email_err' => '',
                    'uname_err' => '',
                    'oldpassword_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'tag_err' => '',
                    
                ];
            }

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
                } else if($data['email'] != $_SESSION['email']){
                    // Check email
                    if($this->profilesModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Username
                if(empty($data['uname'])) {
                    $data['uname_err'] = 'Please enter Username';
                } else if($data['uname'] != $_SESSION['uname']){
                    // Check email
                    if($this->profilesModel->findUserByUsername($data['uname'])) {
                        $data['uname_err'] = 'Username is already taken';
                    }
                }
                $uppercase = preg_match('@[A-Z]@', $data['password']);
                $lowercase = preg_match('@[a-z]@', $data['password']);
                $number = preg_match('@[0-9]@', $data['password']);
                $specialChars = preg_match('@[^\w]@', $data['password']);
                
                // Validate Password
                if(password_verify($data['oldpassword'], $profile->password)){
                    if(empty($data['password'])) {
                        $data['password'] = $data['oldpassword'];
                        $data['confirm_password'] = $data['oldpassword'];
                    } elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['password']) < 8) {
                        $data['password_err'] = 'Password should contain at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                    } elseif(empty($data['confirm_password'])) {
                        $data['confirm_password_err'] = 'Please confirm password';
                    } elseif($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }else{
                    $data['oldpassword_err'] = 'Wrong Password';
                }
                

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One or More Tags';
                }

                // Make sure errors are empty
                if(empty($data['fname_err']) && empty($data['email_err']) && empty($data['lname_err']) && empty($data['uname_err']) && empty($data['oldpassword_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['tag_err'])) {
                    // Validated

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //update user details
                    $this->profilesModel->deleteUserTag();
                    
                    if($this->profilesModel->updateUser($data)) {
                        foreach($data['tag'] as $tag){
                            if(!($this->profilesModel->userTag($tag)))
                             {
                                 die('Something went wrong with inserting the tags');
                             }
                         }
                        // Redirect to login
                        flash('reg_flash', 'Profile Updated');
                        redirect('profiles/seeker');
                    } else {
                        die('Something went wrong');
                    }
                

                } else {
                    // Load view with errors
                    $this->view('profiles/seekeredit', $data);
                }

        }else{

        
            // print_r($tags);
            $data = [
                'profile' => $profile,
                'tags' => $tags->tags,
                'pfp' => '',
                'pfp_name' => '',
                'fname' => '',
                'lname' => '',
                'email' => '',
                'uname' => '',
                'oldpassword' => '',
                'password' => '',
                'confirm_password' => '',
                'tag' => '',
                'fname_err' => '',
                'lname_err' => '',
                'email_err' => '',
                'uname_err' => '',
                'oldpassword_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'tag_err' => '',
            ];
            //print_r($data);
            $this->view('profiles/seekeredit', $data);
        }
    }

    public function expertedit(){
        $profile = $this->profilesModel->getprofile();
        $Atags = $this->profilesModel->getAllTags();
        $expertprofile = $this->profilesModel->getexpertprofile();
        $old_filename = $profile->pfp;
        
        $tags = $this->profilesModel->getUsertags();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form is submitting
            // Validate the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
            // Check if a new file has been uploaded
            if($_FILES['pfp']['error'] == 0) {
                // Generate a unique filename for the uploaded file
                $new_filename = time() . '_' . $_FILES['pfp']['name'];
                    
                // Move the uploaded file to its new location on the server and Validate thumbnail
                if($_FILES['pfp']['size'] > 0){
                    if(uploadImage($_FILES['pfp']['tmp_name'], $new_filename, '/img/pfp/')) {
                        // Uploaded Successfully
                        // Delete the old profile picture file from the server
                        unlink('/img/pfp/' . $old_filename);
                    }else{
                        $_FILES['pfp_err'] = 'Something Went Wrong when uploading the image';
                    }
                }else{
                    $_FILES['pfp_err'] = 'Please Select a Profile Picture';
                }

            //Input Data
            $data = [
                'profile' => $profile,
                'expertprofile' => $expertprofile,
                'tags' => $tags->tags,
                'pfp' => $new_filename,
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'email' => trim($_POST['email']),
                'uname' => trim($_POST['uname']),
                'oldpassword' => trim($_POST['passwordold']),
                'password' => trim($_POST['password']),
                'linkedin' => trim($_POST['linkedin']),
                'qualification' => trim($_POST['qualification']),
                'designation' => trim($_POST['designation']),
                'confirm_password' => trim($_POST['confirm_password']),
                'tag' => $tag,
                'fname_err' => '',
                'lname_err' => '',
                'email_err' => '',
                'uname_err' => '',
                'oldpassword_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'linkedin_err' => '',
                'qualification_err' => '',
                'designation_err' => '',
                'tag_err' => '',
                'newTag' => trim($_POST['newTag']),
                'Atags' => $Atags
            ];
        }else{
            //Input Data
            $data = [
                'profile' => $profile,
                'expertprofile' => $expertprofile,
                'tags' => $tags->tags,
                'pfp' => $old_filename,
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'email' => trim($_POST['email']),
                'uname' => trim($_POST['uname']),
                'linkedin' => trim($_POST['linkedin']),
                'qualification' => trim($_POST['qualification']),
                'designation' => trim($_POST['designation']),
                'oldpassword' => trim($_POST['passwordold']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'tag' => $tag,
                'fname_err' => '',
                'lname_err' => '',
                'email_err' => '',
                'uname_err' => '',
                'linkedin_err' => '',
                'qualification_err' => '',
                'designation_err' => '',
                'oldpassword_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'tag_err' => '',
                'newTag' => trim($_POST['newTag']),
                'Atags' => $Atags
            ];
        }

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
            } else if($data['email'] != $_SESSION['email']){
                // Check email
                if($this->profilesModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            //validate linkedin link
            if(empty($data['linkedin'])) {
                $data['linkedin_err'] = 'Please enter linkedin profile link';
            }

            //validate qualification
            if(empty($data['qualification'])) {
                $data['qualification_err'] = 'Please enter qualification';
            }

            //validate designation
            if(empty($data['designation'])) {
                $data['designation_err'] = 'Please enter designation';
            }

            // Validate Username
            if(empty($data['uname'])) {
                $data['uname_err'] = 'Please enter Username';
            } else if($data['uname'] != $_SESSION['uname']){
                // Check email
                if($this->profilesModel->findUserByUsername($data['uname'])) {
                    $data['uname_err'] = 'Username is already taken';
                }
            }
            $uppercase = preg_match('@[A-Z]@', $data['password']);
            $lowercase = preg_match('@[a-z]@', $data['password']);
            $number = preg_match('@[0-9]@', $data['password']);
            $specialChars = preg_match('@[^\w]@', $data['password']);
            
            // Validate Password
            if(password_verify($data['oldpassword'], $profile->password)){
                if(empty($data['password'])) {
                    $data['password'] = $data['oldpassword'];
                    $data['confirm_password'] = $data['oldpassword'];
                } elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['password']) < 8) {
                    $data['password_err'] = 'Password should contain at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                } elseif(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } elseif($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }else{
                $data['oldpassword_err'] = 'Wrong Password';
            }
            

            // Validate Tag
            if($data['tag'] == '0') {
                $data['tag_err'] = 'Please Select One or More Tags';
            }



            // Make sure errors are empty
            if(empty($data['fname_err']) && empty($data['email_err']) && empty($data['lname_err']) && empty($data['uname_err']) && empty($data['oldpassword_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['tag_err']) && empty($data['linkedin_err']) && empty($data['qualification_err']) && empty($data['designation_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //update user details
                $this->profilesModel->deleteUserTag();
                if($this->profilesModel->updateUser($data) && $this->profilesModel->updateExpert($data)) {
                    foreach($data['tag'] as $tag){
                        if(!($this->profilesModel->userTag($tag)))
                         {
                             die('Something went wrong with inserting the tags');
                         }
                     }
                    // Redirect to login
                    flash('reg_flash', 'Profile Updated');
                    redirect('profiles/expert');
                } else {
                    die('Something went wrong');
                }
            

            } else {
                // Load view with errors
                $this->view('profiles/expertedit', $data);
            }

    }else{

    
        // print_r($tags);
        $data = [
            'profile' => $profile,
            'expertprofile' => $expertprofile,
            'tags' => $tags->tags,
            'pfp' => '',
            'pfp_name' => '',
            'fname' => '',
            'lname' => '',
            'email' => '',
            'uname' => '',
            'linkedin' => '',
            'qualification' => '',
            'designation' => '',
            'oldpassword' => '',
            'password' => '',
            'confirm_password' => '',
            'tag' => '',
            'fname_err' => '',
            'lname_err' => '',
            'email_err' => '',
            'uname_err' => '',
            'linkedin_err' => '',
            'qualification_err' => '',
            'designation_err' => '',
            'oldpassword_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
            'tag_err' => '',
            'newTag' => '',
            'Atags' => $Atags
        ];
        $this->view('profiles/expertedit', $data);
    }
    }

        public function hoverdate(){
            $dateValue = $_POST['Datevalue'];
            $consults = $this->profilesModel->getConsultCal($dateValue);
                            echo '<div id="cal-box">
                                <h4>'.$consults->title.'</h4>
                                    <p>with '.$consults->fName.' '.$consults->lName.'</p>
                                    <span>@ '.date('g:i A', strtotime($consults->time)).'</span>
                                    </div>';
            
        }

    }

?>