function toggleBrowse() {
    document.getElementById("image").click();
    document.getElementById("addImageBtn").style.display = "none";
    document.getElementById("removeImageBtn").style.display = "block";
}
function toggleRemove() {
    document.getElementById("image").value = "";
    document.getElementById("imagePlaceholder").src = "http://localhost/Convo/img/thumbnailpic.png";
    document.getElementById("addImageBtn").style.display = "block";
    document.getElementById("removeImageBtn").style.display = "none";
}
function readURL(input) {
    if (input.files && input.files[0]) {
        //Initiate the FileReader object.
        var reader = new FileReader();

        //Read the contents of Image File.
        reader.readAsDataURL(input.files[0]);

        reader.onload = function (e) {
            //Initiate the JavaScript Image object.
            var image = new Image();

            //Set the Base64 string return from FileReader as source.
            image.src = e.target.result;

            //Validate the File Height and Width.
            image.onload = function () {
                var height = this.height;
                var width = this.width;
                if (height >= 720 || width >= 1280) {
                    alert("Thumbnail size should be least 1280 × 720 pixels.");
                    return false;
                }
                document.getElementById("imagePlaceholder").src = e.target.result;
                return true;
            };
        }
        reader.readAsDataURL(input.files[0]);
    }
}
document.getElementById("image").onchange = function () {
    readURL(this);
};

/******************************************Submit Tag Form*************************************************************/

// document.getElementById('innerform').addEventListener('submit', function(event) {
//     // prevent the form from being submitted
//     event.preventDefault();

//     // select all the checked checkboxes and create an array of their values
//     var selectedItems = [];
//     var checkboxes = document.querySelectorAll('input[name="rp[]"]:checked');
//     for (var i = 0; i < checkboxes.length; i++) {
//         selectedItems.push(checkboxes[i].value);
//     }

//     // do something with selectedItems, such as sending it to the server using AJAX
//     $.ajax({
//         type: "POST",
//         url: "http://localhost/Convo/Questions/search.php",
//         data: { selectedItems: selectedItems },
//         success: function(result) {
//             // do something with the result, such as displaying it on the web page
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             // handle the error
//         }
//     })
// });


const myForm = document.getElementById('innerform');

            myForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            const formData = new FormData(myForm);
            
            fetch('<?php echo URLROOT;?>/FormTag/submitForm', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error(error));
});

//post Interactions

//*******************************************Rating Answers*************************************************************/

function upvote(answerID){
    // alert("upvote");
    if($("#upvote-"+answerID).hasClass("vote")){
        $("#upvote-"+answerID).removeClass("vote");   


    }else {
        if($("#downvote-"+answerID).hasClass("vote")){
            $("#downvote-"+answerID).removeClass("vote");

           
        }

        $("#upvote-"+answerID).addClass("vote");
    }
}

function downvote(answerID){
    // alert("downvote");
    if($("#downvote-"+answerID).hasClass("vote")){
        $("#downvote-"+answerID).removeClass("vote");

        
    }else {
        if($("#upvote-"+answerID).hasClass("vote")){
            $("#upvote-"+answerID).removeClass("vote");

          
        }

        $("#downvote-"+answerID).addClass("vote");
    }
}


       
