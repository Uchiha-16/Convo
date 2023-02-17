<?php require APPROOT . '/views/inc/header.php'; ?>

<h1>Questions</h1>

<?php
foreach($data['question'] as $question) :  ?>
    <p>
        <?php echo $question->title; ?> - <?php echo $question->QID; ?>
    </p>
<?php endforeach; ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>