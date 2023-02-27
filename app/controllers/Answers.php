<?php
    class Answers extends Controller{
        public function __construct() {
           $this->answersM = $this -> model('answersM');

        }

    
    public function viewA($QID){
        $question = $this->answersM->getQuestion($QID);
        $answers = $this->answersM->getAnswers($QID);
        $Quser = $this->answersM->Quser($QID);
        $count = $this->answersM->answerCount($QID);

        $data = [
            'question' => $question,
            'answers' => $answers,
            'Quser' => $Quser,
            'count' => $count
        ];
    
        $this->view('answers/viewA', $data);
    }

    public function add($QID){
        $question = $this->answersM->getQuestion($QID);
        $Quser = $this->answersM->Quser($QID);
     

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form is submitting
            // Validate the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            date_default_timezone_set('Asia/Colombo');

            $link = $_POST['link'];
            $path = parse_url($link, PHP_URL_PATH); // extract the path component of the URL
            $segments = explode('/', $path); // split the path into an array of segments

            $last_segment = end($segments); // extract the last segment of the array
            //Input Data
            $data = [
                'content' => trim($_POST['content']),
                'date' => date('Y-m-d H:i:s'),
                'embedlink' => $last_segment,
                'attachment' => trim($_POST['image']),
                'rating' => 0,
                'QID' => $QID,
                'expertID' => $_SESSION['userID'],    
                'content_err' => '',
                'link_err' => '',
                'question' => $question,
                'Quser' => $Quser,
            ];

            // Validate Content
            if(empty($data['content'])) {
                $data['content_err'] = 'Please enter Content';
            }




            // Make sure errors are empty
            if(empty($data['content_err'])) {
                // Adding Question
                if($this->answersM->add($data)) {
                    
                    flash('reg_flash','Answer Added Successfully');
                    redirect('answers/viewA/'.$QID.'');
                    
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('answers/add', $data);
            }
        }
        else {
            $data = [
                'content' => '',
                'date' => '',
                'embedlink' => '',
                'attachment' => '',
                'rating' => '', 
                'QID' => '',
                'expertID' => '',    
                'content_err' => '', 
                'question' => $question,
                'Quser' => $Quser,
            ];
            $this->view('answers/add', $data);
        }
    }

}
?>