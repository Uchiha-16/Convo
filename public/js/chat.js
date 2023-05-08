//add the class selected to the existing class
var intervalID; 
function selected(chatID) {
    clearInterval(intervalID);
    var element = document.getElementById("chat group-"+chatID);
    element.classList.add("selected");
    //unselect all other class
    var elements = document.getElementsByClassName("chat");
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].id != "chat group-"+chatID) {
            elements[i].classList.remove("selected");
        }
    }

     //setInterval(5000,show(chatID));

    // var conn = new WebSocket('ws://localhost:8080');
    // conn.onopen = function (e) {
    //     console.log('Connection established!');
    //     conn.send(JSON.stringify({
    //         'newRoute': 'Personalchat'+chatID 
    //     }));

    // };
}

//show the chat messages when clicked
function showchat(chatID) {
    //reveal messeges

    $(document).ready(function() {
        //onload show the comments
        
            $.ajax({
                url: URLROOT + '/Chats/show/'+chatID,
                dataType: 'html',
                success: function(results) {
                    $('#results').html(results);
                }
            })
            // setInterval(showchat(chatID),20000);
    }
)
    //show group members
    $(document).ready(function() {
        
            $.ajax({
                url: URLROOT + '/Chats/showMembers/'+chatID,
                dataType: 'html',
                success: function(results) {
                    $('#members').html(results);
                }
            })
    })
};



//show the popup to create a chat group
function showCreate() {
    document.getElementById("popup").style.display = "block";
  }
  
  function hideCreate() {
    document.getElementById("popup").style.display = "none";
  }


    function send(chatID) {
        var message = document.getElementById("message").value;
        //alert(message);
        if (message != "") {
            $.ajax({
                url: URLROOT + '/Chats/send/'+chatID,
                type: 'POST',
                data: {message: message},
                success: function(results) {
                    //alert("success"+chatID);
                    //$('#results').html(results);
                }
            });
            showchat(chatID);  
           
        }
    }

    function deleteChat(chatID){
        //alert(URLROOT);
        if (confirm("Are you sure you want to delete this chat?")) {

        $.ajax({
            url: URLROOT + '/Chats/delete/',
            type: 'POST',
            data: {chatID: chatID},
            success: function(results) {
                //alert("success"+chatID);
                //$('#results').html(results);
                window.location.href = URLROOT + '/Chats';
            }
        });
    }
    }

    function leaveChat(chatID){
        if (confirm("Are you sure you want to leave this chat?")) {
        $.ajax({
            url: URLROOT + '/Chats/leave/',

            type: 'POST',
            data: {chatID: chatID},
            
            success: function(results) {
                //alert("success"+chatID);
                //$('#results').html(results);
                window.location.href = URLROOT + '/Chats';
            }
        });
    }
       

    }
