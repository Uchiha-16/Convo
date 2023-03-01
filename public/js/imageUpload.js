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