<?php
    class Notification extends Controller {
        private $notifyModel;
        public function __construct() {
            $this->notifyModel = $this -> model('notificationM');
        }

        public function show(){
            $userID = $_SESSION['userID'];
            $notifications = $this->notifyModel->getNotifications($userID);
            $i = 0;
            foreach($notifications as $notification){
                // echo $i;
                if($notification->type == "Accepted" || $notification->type == "Declined"){
                    $questionApproval[$i] = $this->notifyModel->getQuestion($notification->userID,$notification->expertID,$notification->typeID);
                    // print_r($questionApproval[$i]);
                }elseif($notification->type == "questionExpert"){
                    $SendToExpert[$i] = $this->notifyModel->sendQuestion($notification->userID,$notification->expertID,$notification->typeID);
                }elseif($notification->type == "answer"){
                    $answeradded[$i] = $this->notifyModel->getAnswer($notification->userID,$notification->expertID,$notification->typeID);
                }elseif($notification->type == "comment"){
                    $commentadded[$i] = $this->notifyModel->getComment($notification->expertID);
                }elseif($notification->type == "chat"){
                    $messageadded[$i] = $this->notifyModel->getChat($userID,$notification->expertID,$notification->typeID);
                }elseif($notification->type == "consult"){
                    $consultApproval[$i] = $this->notifyModel->getConsult($notification->userID,$notification->expertID,$notification->typeID);
                }
                $i++;
        }
        // print_r($notifications);
        //   print_r($answeradded);
        //   print_r($commentadded);
        //   print_r($SendToExpert);
        //   print_r($questionApproval);
            $i1 = 0;
            foreach($notifications as $notification){
                echo'<div class="tabs">';
                // echo $i1;
                if($notification->type == "Accepted" && $questionApproval[$i1]->QID == $notification->typeID){
                    //print_r($questionApproval);
                    echo '<P><b>Your Question </b><span style="color:#00a7ae;">'.$questionApproval[$i1]->title.' </span> was Approved by <span style="color:#00a7ae;">' .$questionApproval[$i1]->fName." ".$questionApproval[$i1]->lName.'</span> </P>';
                }
                elseif($notification->type == "Declined" && $questionApproval[$i1]->QID == $notification->typeID){
                    echo '<P><b>Your Question</b><span style="color:#00a7ae;">'.$questionApproval[$i1]->title.' was Declined</span> by' .$questionApproval[$i1]->fName." ".$questionApproval[$i1]->lName.'</P>';;
                }
                elseif($notification->type == "questionExpert"){
                    echo '<P><b>'.$SendToExpert[$i1]->fName." ".$SendToExpert[$i1]->lName.'</b> Asked you a Question on <span style="color:#00a7ae;">'.$SendToExpert[$i1]->title.'</span></P> ';
                }
                elseif($notification->type == "answer"){
                    echo '<P><b>'.$answeradded[$i1]->fName." ".$answeradded[$i1]->lName.'</b> Answered your Question on <span style="color:#00a7ae;">'.$answeradded[$i1]->title.'</span></P> ';
                }
                elseif($notification->type == "comment"){
                    echo '<P><b>'.$commentadded[$i1]->firstName." ".$commentadded[$i1]->lastName.'</b>Commented on your answer on<span style="color:#00a7ae;">  one of your answers</span></P> ';
                }
                elseif($notification->type == "chat"){
                    echo '<P><b>You have</b>unread messages on<span style="color:#00a7ae;">Chat group</span></P> ';
                }
                elseif($notification->type == "consult"){
                    echo '<P><b>Your Consultation</b><span style="color:#00a7ae;">String Theory was Approved</span> by Varsha Wijethunge</P>';
                }
                $i1++;

                            
                echo '</div>';
            }


        }
        
        public function getCount(){
            $userID = $_SESSION['userID'];
            $count = $this->notifyModel->getCount($userID);
            echo $count->count;
        }

    }

?>