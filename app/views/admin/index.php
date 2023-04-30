<?php require APPROOT .'/views/inc/header.php'; ?> 
<link href="<?php echo URLROOT;?>/css/event.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/admin.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?><?php elseif (($_SESSION['role']) == 'expert') : ?>.nav {
        grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
    }

    <?php endif; ?>
</style>

<!-- <style>
    .warpper {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .tab {
    cursor: pointer;
    padding: 10px 20px;
    margin: 0px 2px;
    background: #19758D;
    display: inline-block;
    color: #fff;
    border-radius: 5px 5px 0px 0px;
    box-shadow: 0 0.5rem 0.8rem #00000080;
  }
  
  .panels {
    background: #fff;
    box-shadow: 0px 0px 24px #8a9091;
    height:400px;
    /* width: 100%; */
    width: 800px; 
    border-radius: 5px;
    overflow: hidden;
    padding: 40px;
    padding-top: 20px;

  }
  
  .panel {
    display: none;
    animation: fadein 0.8s;
  }
  
  @keyframes fadein {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
  
  .panel-title {
    font-size: 1.5em;
    font-weight: bold;
  }
  
  .radio {
    display: none;
  }
  
  #one:checked ~ .panels #one-panel,
  #two:checked ~ .panels #two-panel,
  #three:checked ~ .panels #three-panel {
    display: block;
  }
  
  #one:checked ~ .tabs #one-tab,
  #two:checked ~ .tabs #two-tab,
  #three:checked ~ .tabs #three-tab {
    background: #fff;
    color: #000;
    border-top: 3px solid #19758D;
  }
</style> -->

<script type="text/javascript">
   
</script>

</head>


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



        <!-- body content -->
        <div class="container-div">
            <div class="content-body">
                <div class="LHS">
                    <div class="warpper">
                        <input class="radio" id="one" name="group" type="radio" checked>
                        <input class="radio" id="two" name="group" type="radio">
                       

                        <div class="tabs">
                            <label class="tab" id="one-tab" for="one">Users</label>
                            <label class="tab" id="two-tab" for="two">Complaints</label>
                          
                        </div>

                        <div class="panels">
                            <div class="panel" id="one-panel">
                            <div class="panel-title">Users</div>

                                <div class="filter">
                                    <form method="get">
                                        <div>
                                            <label>Filter by Role:</label>
                                            <select name="role" style="font-size:12px;" onchange="this.form.submit()">
                                                <option value="" <?php if(empty($_GET['role'])) echo 'selected'; ?>>All</option>
                                                <option value="seeker" <?php if(isset($_GET['role']) && $_GET['role'] == 'seeker') echo 'selected'; ?>>Seeker</option>
                                                <option value="expert" <?php if(isset($_GET['role']) && $_GET['role'] == 'expert') echo 'selected'; ?>>Expert</option>
                                                <option value="company" <?php if(isset($_GET['role']) && $_GET['role'] == 'company') echo 'selected'; ?>>Company</option>
                                                <option value="premium" <?php if(isset($_GET['role']) && $_GET['role'] == 'premium') echo 'selected'; ?>>Premium Users</option>

                                            </select>
                                        </div> 
                                    </form> 
                                </div>
                                    <br>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <!-- <th>Name</th> -->

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php if(isset($data['users']) && is_array($data['users']) && !empty($data['users'])): ?>
                                            <?php foreach($data['users'] as $user): ?>
                                                <tr>
                                                    <td><?= $user->name ?></td>
                                                    <td> <a href ="users/profile/<?= $user->userID ?>"><?= $user->uname ?></a></td>
                                                    <td><?= $user->email ?></td>
                                                    <td><?= $user->role ?></td>

                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No users found.</p>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

                                

                            </div>
                            <div class="panel" id="two-panel">
                            <div class="panel-title">Complaints or Reports</div>
                                
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>User</th>
                                            <th>User Role</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (isset($data['complaints'])): ?>
                                            <?php foreach($data['complaints'] as $complaint): ?>
                                                <tr>
                                                    <td><?= $complaint -> title ?></td>
                                                    <td><?= $complaint ->description ?></td>
                                                    <td>
                                                        <?php if ($complaint->visibility =='anonymus'): ?>
                                                            Anonymous 
                                                        <?php else: ?>
                                                            <a href ="users/profile/<?= $complaint->userID ?>"><?= $complaint->uname ?></a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $complaint->role ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4">No complaints found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            
                            </div>
                            
                        </div>
                    </div>
                </div>


                <div class="RHS">
                
                </div>
            <div>
                <footer><a href="index.php">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        </div>
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <div id="body"></div>
        
       
    </body>

       


    