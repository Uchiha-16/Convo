function loadC(threadId) {
    $(document).ready(function() {
        $('#com-'+threadId).click(function(event) {
            event.preventDefault();
            event.stopPropagation();
        //onload show the comments
            $.ajax({
                url: URLROOT + '/Comments/show/'+threadId,
                dataType: 'html',
                success: function(results) {
                    $('#results-'+threadId).html(results);
                }
            })
            
            document.getElementById("com-"+threadId).style.display = "none";
        });
    }
)};

function loadComments(threadId) {
    $(document).ready(function() {
        //adding a comment
        
        $('#commentbtn-'+threadId).click(function(event) {
            event.preventDefault();
            event.stopPropagation();

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
                        // $('#msg-'+threadId).text(comment);
                    }
                })

                //refresh the comment thread
                $.ajax({
                    url: URLROOT + '/Comments/show/'+threadId,
                    dataType: 'html',
                    success: function(results) {
                        $('#results-'+threadId).html(results);
                    }
                })

                $('#comment-'+threadId).val('');
            }
        });

    })
};


