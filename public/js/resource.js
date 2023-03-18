function getTags(threadId) {
    $(document).ready(function() {
        //adding a comment

            //check if the comment is empty
            if ($('#comment-'+threadId).val() == '') {
                alert('Please enter a comment');
                
            }else {
                $.ajax({
                    url: URLROOT + '/Comments/comment/'+threadId,
                    method: 'post',
                    data: $('#comment-'+threadId).serialize(),
                    dataType: 'text',
                    success: function() {
                        
                    }
                });
            }
            //refresh the comment thread
            $.ajax({
                url: URLROOT + '/Comments/show/'+threadId,
                dataType: 'html',
                success: function(results) {
                    $('#results-'+threadId).html(results);
                }
            });
            $('#comment-'+threadId).val('');
            document.getElementById("com-"+threadId).style.display = "none";
            
    })
};