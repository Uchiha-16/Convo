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

//...........................................Vote............................................//
// var upvote_state = false;
// var downvote_state = false;

// function upvote(){
//     if(upvote_state === false){
//         document.getElementById("upvote").style.color = "#0D5F75";
//         document.getElementById("downvote").style.color = "#95a5a6";
//         upvote_state = true;
//         downvote_state = false;
//     }else{
//         document.getElementById("upvote").style.color = "#95a5a6";
//         upvote_state = false;
//     }
// }

// function downvote(){
//     if(downvote_state === false){
//         document.getElementById("downvote").style.color = "#0D5F75";
//         document.getElementById("upvote").style.color = "#95a5a6";
//         upvote_state = false;
//         downvote_state = true;
//     }else{
//         document.getElementById("downvote").style.color = "#95a5a6";
//         downvote_state = false;
//     }
// }

        

//=========================================== Navbar Drop Down

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function drop() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function drop2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
    var myDropdown2 = document.getElementById("myDropdown2");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
    if (myDropdown2.classList.contains('show')) {
      myDropdown2.classList.remove('show');
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
//   if (confirm("By Publishing, you acknowledge that you agree to Convo's Terms of Service and Community Guidelines. Please be sure not to violate others' copyright or privacy rights.")) {
    
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


