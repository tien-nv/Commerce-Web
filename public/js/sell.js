var image;
var imageBtn;
var customTxt;
var input=0;

window.onload = function () {
    image = document.getElementById('image');
    imageBtn = document.getElementById("image-button");
    customTxt = document.getElementById("image-text");

    imageBtn.addEventListener("click", function() {
        image.click();
      });
      
      image.addEventListener("change", function() {
            if(image.files.length !=0){
                customTxt.innerHTML = image.files.length +" file choosed";
                
            }else{
                customTxt.innerHTML = "No file chosen, yet.";
            }
      });
};

function addField(){
    input++;
    if(input <= 4){
        var form = document.getElementById('next');
        var textbox = document.createElement('input');
        textbox.className = "form-group col-md-6 offset-md-3";
        textbox.type="text";
        textbox.name="Description" + input;
        textbox.placeholder="Description #" + input; 
        var line = document.createElement('br');
        form.appendChild(line);
        form.appendChild(textbox);
        return false;
    }
}


