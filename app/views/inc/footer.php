        <div id="body">
        </div>
        
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';
        </script>

        <script type="text/JavaScript">
            <?php if(isset($_SESSION['userID'])): ?>
                var ROLE = '<?php echo $_SESSION['role']; ?>';
                <?php else : ?>
                var ROLE = 'guest';
            <?php endif; ?>
            
        </script>


        <script src="<?php echo URLROOT; ?>/js/comments.js" type="text/javascript"></script>
        <script src="<?php echo URLROOT; ?>/js/imageUpload.js"></script>
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/jQuery/jQuery.js"></script>
        <script src="<?php echo URLROOT; ?>/js/rating.js" type="text/javascript"></script>
        <script src="<?php echo URLROOT; ?>/js/textEditor.js" type="text/javascript"></script>
        <script src="<?php echo URLROOT; ?>/js/notifictaions.js" type="text/javascript"></script>

        

    </body>
</html>