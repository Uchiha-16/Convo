// Select all elements with the "i" tag and store them in a NodeList called "stars"
const stars = document.querySelectorAll(".stars i");

// Loop through the "stars" NodeList
stars.forEach((star, index1) => {
    // Add an event listener that runs a function when the "click" event is triggered
    star.addEventListener("click", () => {
        // Loop through the "stars" NodeList Again
        stars.forEach((star, index2) => {
            // Add the "active" class to the clicked star and any stars with a lower index
            // and remove the "active" class from any stars with a higher index
            index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
        });
    });
});


//Count Active classes for the stars
function countActive() {
    var active = document.querySelectorAll(".stars .active");
    var count = active.length;
    //alert ("Rating: " + count + " stars");

    $(document).ready(function() {
        $.ajax({
            url: URLROOT + '/Answers/rating/'+ QID,
            method: 'post',
            data: {count: count},
            dataType: 'text',
            success: function() {
                //alert ("Rating: " + count + " stars");
            }
        })
        $.ajax({
            url: URLROOT + '/Questions/viewR/'+QID,                
            dataType: 'html',
            success: function(results) {
                // alert(results);
                $('.qrate').html(results);
            }
        })
        

    });
}


// $(document).ready(function() {
//     $('.stars').click(function(event) {
//         event.preventDefault();
//         event.stopPropagation();
//     //onload show rating
       
//     })
// });