//=========================================== nav bar active state
jQuery(function ($) {
  var path = window.location.href;
  // because the 'href' property of the DOM element is the absolute path
  $('.nav-hover a').each(function () {
    if (this.href === path) {
      $(this).addClass('active');
    }
  });
});

//=========================================== Picture Upload
// const imgDiv = document.querySelector('.user-img');
// const img = document.querySelector('#photo');
// const file = document.querySelector('#file');
// const uploadebtn = document.querySelector('#uploadbtn');

// file.addEventListener( 'change', function(){
//     const choosedfile = this.files[0];
//     if(choosedfile){
//         const reader = new FileReader();
        
//         reader.addEventListener( 'load', function(){
//             img.setAttribute('src', reader.result);
//         })
//     reader.readAsDataURL(choosedfile);
//     }
// })


//=========================================== Move Top

//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

//*******************************************Rating Answers*************************************************************/

function upvote(answerID){
  // alert("upvote");
  if($("#upvote-"+answerID).hasClass("vote")){
      $("#upvote-"+answerID).removeClass("vote");   

      removeupRating(answerID);

  }else {
      if($("#downvote-"+answerID).hasClass("vote")){
          $("#downvote-"+answerID).removeClass("vote");

          removedownRating(answerID);
         
      }

      $("#upvote-"+answerID).addClass("vote");
      incRating(answerID);
  }
}

function downvote(answerID){
  // alert("downvote");
  if($("#downvote-"+answerID).hasClass("vote")){
      $("#downvote-"+answerID).removeClass("vote");

      removedownRating(answerID);
      
  }else {
      if($("#upvote-"+answerID).hasClass("vote")){
          $("#upvote-"+answerID).removeClass("vote");

          removeupRating(answerID);
        
      }

      $("#downvote-"+answerID).addClass("vote");
      decRating(answerID);
  }
}

function incRating(answerID){
  $.ajax({
    url: URLROOT + '/Answers/upvote/'+answerID,
    method: 'post',
    data: $("form").serialize(),
    dataType: 'text',
    success: function (likes) {
      $("#rating-"+answerID).text(likes);
    }
  })
}

function decRating(answerID){
  $.ajax({
    url: URLROOT + '/Answers/downvote/'+answerID,
    method: 'post',
    data: $("form").serialize(),
    dataType: 'text',
    success: function (likes) {
      $("#rating-"+answerID).text(likes);
    }
  })
}

function removeupRating(answerID){
  $.ajax({
    url: URLROOT + '/Answers/Removeupvote/'+answerID,
    method: 'post',
    data: $("form").serialize(),
    dataType: 'text',
    success: function (likes) {
      $("#rating-"+answerID).text(likes);
    }
  })
}

function removedownRating(answerID){
  $.ajax({
    url: URLROOT + '/Answers/Removedownvote/'+answerID,
    method: 'post',
    data: $("form").serialize(),
    dataType: 'text',
    success: function (likes) {
      $("#rating-"+answerID).text(likes);
    }
  })
}
//=========================================== Navbar Drop Down

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function drop() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function drop2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

function drop3() {
  document.getElementById("myDropdown3").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
    var myDropdown2 = document.getElementById("myDropdown2");
    var myDropdown3 = document.getElementById("myDropdown3");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
    if (myDropdown2.classList.contains('show')) {
      myDropdown2.classList.remove('show');
    }
    if (myDropdown3.classList.contains('show')) {
      myDropdown3.classList.remove('show');
    }
  }
}
            

//=========================================== Filters

function filter1() {
  var x = document.getElementById('checkbox-1');
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById('down').style.display = "none";
    document.getElementById('up').style.display = "inline-block";
  } else {
    x.style.display = "none";
    document.getElementById('up').style.display = "none";
    document.getElementById('down').style.display = "inline-block";
  }
}
function filter2() {
  var x = document.getElementById('checkbox-2');
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById('down2').style.display = "none";
    document.getElementById('up2').style.display = "inline-block";
  } else {
    x.style.display = "none";
    document.getElementById('up2').style.display = "none";
    document.getElementById('down2').style.display = "inline-block";
  }
}
function filter3() {
  var x = document.getElementById('checkbox-3');
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById('down3').style.display = "none";
    document.getElementById('up3').style.display = "inline-block";
  } else {
    x.style.display = "none";
    document.getElementById('up3').style.display = "none";
    document.getElementById('down3').style.display = "inline-block";
  }
}
function filter4() {
  var x = document.getElementById('checkbox-4');
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById('down4').style.display = "none";
    document.getElementById('up4').style.display = "inline-block";
  } else {
    x.style.display = "none";
    document.getElementById('up4').style.display = "none";
    document.getElementById('down4').style.display = "inline-block";
  }
}


//=========================================== Add Question

function confirmation() {
  if (confirm("Are you sure you want to discard this question?")) {
    window.location.href = "../home.php";
  }
}

function addQuestion() {
  alert("Question Added Successfully...  WAITING FOR APPROVAL");
  window.location.href = "../home.php";
}


var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function () {
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function () { div.style.display = "none"; }, 600);
  }
}

//=========================================== Webinar - Video view

function view() {
  document.getElementById("1").style.display = "grid";
}
function cancel() {
  document.getElementById("1").style.display = "none";
}

//=========================================== Webinar - Video view

// function webinarPublish() {
//   if (confirm("")) {
    
//   }
// }

//========================================== playlist 

function showDiv(divId, element) {

  document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
  if (element.value == 1) {
    element.value = 0;
  } else {
    element.value = 1;
  }
}

//=========================================== Add

function show2() {
  document.getElementById("dropdown2").style.display = "grid";
}


//================================Search Bar===========================================//
$(document).ready(function(){
  $("#live_search").keyup(function(){
    var input = $(this).val();
    //alert(input);
    if(input != ""){
      // alert(input);
    $.ajax({
      url: URLROOT + '/Pages/search/',
      method: 'post',
      data: {keywords:input},
      dataType: 'text',
      success: function (response) {
        $("#LHS").html(response);
        //alert(ROLE);
      }
      
    })
    }else{
      //redirect  to index controller
    
      if(ROLE == 'seeker'){
        window.location = URLROOT + "/pages/seeker";
      }else if(ROLE == 'expert'){
        window.location = URLROOT + "/pages/expert";
      }else{
        window.location = URLROOT + "/pages/index";
      }

    }
  })
});

