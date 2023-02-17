function validate(){
    if(document.getElementById('p1').value == document.getElementById('p2').value){
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Passwords match!';
    }else{
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Passwords do not match!';
    }
}