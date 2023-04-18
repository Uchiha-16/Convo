//add the class selected to the existing class
function selected(chatID) {
    var element = document.getElementById("chat group-"+chatID);
    element.classList.add("selected");
    //unselect all other class
    var elements = document.getElementsByClassName("chat");
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].id != "chat group-"+chatID) {
            elements[i].classList.remove("selected");
        }
    }
}

//show the chat messages when clicked
function showchat(chatID) {
    //reveal messeges
    //alert("success"+chatID);
    $(document).ready(function() {
        //onload show the comments
        
            $.ajax({
                url: URLROOT + '/Chats/show/'+chatID,
                dataType: 'html',
                success: function(results) {
                    //alert("success"+chatID);
                    $('#results').html(results);
                }
            })
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

  //function to send the message
    function send(chatID) {
        var message = document.getElementById("message").value;
        //alert(message);
        if (message != "") {
            $.ajax({
                url: URLROOT + '/Chats/send/'+chatID,
                type: 'POST',
                data: {message: message},
                success: function(results) {
                    alert("success"+chatID);
                    //$('#results').html(results);
                }
            })
        } setInterval(function() {
            showchat(chatID);
        }, 2000);
    }

//   $(document).ready(function() {
//     // Load chat messages
//     loadChat();

//     // Send message when form is submitted
//     $("#chatForm").on("submit", function(e) {
//         e.preventDefault();
//         var message = $("#message").val();
//         if (message !== "") {
//             $.ajax({
//                 url: "process.php",
//                 type: "POST",
//                 data: {message: message},
//                 success: function(response) {
//                     $("#message").val("");
//                     loadChat();
//                 }
//             });
//         }
//     });

    // Refresh chat messages every 2 seconds
//     setInterval(function() {
//         loadChat();
//     }, 2000);
// });

// Function to load chat messages
// function loadChat() {
//     $.ajax({
//         url: "get_messages.php",
//         type: "GET",
//         success: function(response) {
//             $("#chatbox").html(response);
//             $("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
//         }
//     });
// }