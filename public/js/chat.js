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

    var conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function (e) {
        console.log('Connection established!');
        conn.send(JSON.stringify({
            'newRoute': 'Personalchat'+chatID 
        }));

    };
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

  function typing(name){
    conn.send(JSON.stringify({
        'typing': 'y',
        'name': name
    }));
}

  function send(chatID,datesent,commentor) {
  
    conn.send(JSON.stringify({
        'msg': input.value,
        'name': commentor,
        'date': datesent
    }));

    sendMessage(input.value, chatID,datesent);

    var chatWindow = document.getElementById('chattyping');
    var newMessage = document.createElement('div');
    newMessage.classList.add(
        'qdp dlg-box'
    );
    newMessage.innerHTML = commentor + " : " + input.value + " " + datesent;
    chatWindow.appendChild(newMessage);
    input.value = '';
}

function sendMessage(message, chatID, date) {
    let data = {
        'message': message,
        'chatID': chatID,
        'date':date
    };
    fetch('<?php echo URLROOT;?>/Chats/send', {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify(data)
}).then(response => response.json())
    .then(json => { 
        console.log(json);
    });
}