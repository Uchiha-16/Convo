$(document).ready(function() {
    //adding a comment
    $('#commentbtn').click(function(event) {
        event.preventDefault();

        //check if the comment is empty
        if ($('#comment').val() == '') {
            alert('Please enter a comment');
            
        }else {
            $.ajax({
                url: URLROOT + '/Comments/comment/'+ CURRENT_THREAD,
                method: 'POST',
                data: $('#comment').serialize(),
                dataType: 'text',
                success: function(comment) {
                    $('#msg').text(comment);
                }
            });
        }
    });
})