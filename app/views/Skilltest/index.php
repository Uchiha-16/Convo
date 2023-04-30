
<?php require APPROOT . '/views/inc/header.php'; ?>

<link href="<?php echo URLROOT; ?>/css/sboard.css" rel="stylesheet" type="text/css"/>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?>
    <?php elseif (($_SESSION['role']) == 'expert') : ?>
      .nav {
        grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
    }

    <?php endif; ?>
</style>



</head>

<body>
<?php if (($_SESSION['role']) == 'seeker') : ?>
        <?php require APPROOT . '/views/inc/components/Snavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'expert') : ?>
        <?php require APPROOT . '/views/inc/components/Enavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'seeker/mod') : ?>
        <?php require APPROOT . '/views/inc/components/SMnavbar.php'; ?> 
    <?php elseif (($_SESSION['role']) == 'expert/mod') : ?>
        <?php require APPROOT . '/views/inc/components/EMnavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'premium') : ?>
        <?php require APPROOT . '/views/inc/components/Pnavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'admin') : ?>
        <?php require APPROOT . '/views/inc/components/Anavbar.php'; ?>
    <?php endif; ?>



    <div class="grid">
      <h1 style="color:black">Skill Test</h1>
          <div class="mod">
            <p class="desc">To gain the MODERATOR role, you must at least have a pass greater than 80%.<br>
            Moderators are granted with the access of Approving Questions, Events and Webinars<br>
            Handling. They will recieve a commission appon work.</p><br>
          </div>
          <div class="gridleft"> 

               <div class="score">
                  	<h3>Skill Test Scoreboard</h3>
                    <div class="circle-wrap">
                         <div class="circle">
        
                            <div class="mask full">
                                <div class="fill"></div>
                            </div>
       
                            <div class="mask half">
                              <div class="fill"></div>
                            </div>
        
                          <div class="inside-circle">
                          <?php echo $data['average_score'] ?>%

                          </div>
        
                         </div>
                    </div>

                    <div class="score_table">
                      <?php if (!empty($data['score'])): ?>
                      <table>
                          <thead>
                              <tr>
                                  <th>Field</th>
                                  <th>Score</th>
                                  <th>Grade</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php if (is_array($data['score']) || is_object($data['score'])) : ?>
                              <?php foreach ($data['score'] as $row) : ?>
                                  <tr>
                                      <td><?= $row['tag'] ?></td>
                                      <td><?= $row['score'] ?></td>

                                      <td>
                                        <?php if ($row['score'] >= 90) {
                                            echo 'A';
                                        } elseif ($row['score'] >= 80) {
                                            echo 'B';
                                        } elseif ($row['score'] >= 70) {
                                            echo 'C';
                                        } elseif ($row['score'] >= 60) {
                                            echo 'D';
                                        } else {
                                            echo 'F';
                                        } ?>
                                    </td>
                                  </tr>
                              <?php endforeach; ?>
                          <?php endif; ?> 
                          </tbody>
                      </table>
                  <?php else: ?>
                      <p><?= $score_error ?? 'No scores found for this user' ?></p>
                  <?php endif; ?>
                  </div>

                    
                  </tbody> 
                </table>
              </div>

          </div>
          
        <div class="middle">
            <h3>Select a Tag to begin a Skill Test!<br>
                    Good Luck :)</h3>
                    <?php if (!empty($data['tag'])): ?>
                     
                <form method="POST" action="<?php echo URLROOT; ?>/SkillTest/test">
        
                    <?php foreach ($data['tag'] as $tag): ?>
                      <ul>
                      
                          <input type="radio" name="tag" value="<?= $tag->tag ?>" id="<?= $tag->tag ?>">
                          <label for="<?= $tag->tag ?>"><?= $tag->tag ?></label>
                      
                    </ul>
                    <?php endforeach; ?>
                    <button class="start" type="submit">START</button>
                  </form>

                  <?php else: ?> 
                    <p><?= $tag_error ?? 'No tags found for this user' ?></p>
                  <?php endif; ?>

            <!-- <button class="start" > <a href="<?php echo URLROOT; ?>/Skilltest/test"> START</a></button> -->
            
            <div class="total_skill">Total Skill Tests: <?php echo count($data['score'])?></div>

            <div class="m_role">Moderator Roles: 
               <?php foreach ($data['score'] as $row) : ?>
                  <?php if($row['score']>=80):?>
                    <?php echo $row['tag']?>
                  <?php endif; ?>
                <?php endforeach ;?>
              </div>
        </div>


          
        <div class="line"></div>






        <div class="gridright">
        <div class="c4">  
            <div class="tagbox">
                    <table>
                        <!-- <tr>
                            <td colspan="2"><button type="submit" class="btn1">Skill Test</button></td>
                        </tr> -->
                        <tr>
                            <td colspan="2"  class="taghead" ><p style="margin-left:15px; font-size:18px">Tags <img src="<?php echo URLROOT; ?>/img/question.png" alt="question"  width="17px" height="17px"></p></td>
                        </tr>
                    </table>
               <div class="tags1">
        <?php foreach($data['tag'] as $tag): ?>
            <a href="#"><button class="btn2"><?php echo $tag->tag; ?></button></a>
        <?php endforeach; ?>
    </div>
            </div>
          </div>


    




<style>
        /* Style for radio buttons */
        input[type="radio"] {
        width: 15px;
        height: 15px;
        margin-right: 5px;
                        }
    .circle-wrap .circle .mask.full,
    .circle-wrap .circle .fill {
    animation: fill ease-in-out 2s;
    transform: rotate(<?php echo $data['average_score'] * 1.8 ?>deg);
      }

      @keyframes fill {
                0% {
                  transform: rotate(0deg);
                }
                100% {
                  transform: rotate(<?php echo $data['average_score'] * 1.8 ?>deg);
                  
                }
              }
                        
</style>










    </div>