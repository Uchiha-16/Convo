//*******************************************Image Upload*************************************************************/
function toggleBrowse() {
    document.getElementById("image").click();
    document.getElementById("addImageBtn").style.display = "none";
    document.getElementById("removeImageBtn").style.display = "block";
}
function toggleRemove() {
    document.getElementById("image").value = "";
    document.getElementById("imagePlaceholder").src = "http://localhost/Convo/img/user.jpg";
    document.getElementById("addImageBtn").style.display = "block";
    document.getElementById("removeImageBtn").style.display = "none";
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("imagePlaceholder").src = e.target.result;
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
    
