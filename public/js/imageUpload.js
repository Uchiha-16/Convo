
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