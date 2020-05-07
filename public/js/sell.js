var image;
var imageBtn;
var customTxt;
var input=0;

window.onload = function () {
    image = document.getElementById('images');
    imageBtn = document.getElementById("images-button");
    customTxt = document.getElementById("images-text");

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
        var message = document.createElement('span');
        
        textbox.className = "form-group col-md-6 offset-md-3";
        textbox.type="text";
        textbox.name="Description" + input;
        textbox.placeholder="Description #" + input;
        textbox.minLength = "10";
        textbox.maxLength = "100";  
        textbox.required;   
        message.id="Description" + input;
        message.className= "form-group col-md-6 offset-md-3";
        var line = document.createElement('br');
        form.appendChild(message);
        form.appendChild(line);
        form.appendChild(textbox);
        return false;
    }
}


var color = [
    'red', 'green','blue','black','gray', 'white', 'yellow', 'pink', 'purple', 'orange'
];

var type = [
    'phone', 'laptop', 'camera' , 'tv', 'fridge' , 'keyboard', 'book' , 'clothes'
];

function checkColor(){
    let val = document.forms['sell-form']['color'].value.toLowerCase();
    let des = document.getElementById('color');
    let pos = color.indexOf(val);

    if(pos <0){
        des.innerHTML = "==> Màu này không hợp lệ, vui lòng điền lại";
        return false;
    }
    else{
        des.innerHTML = "";
        return true;
    }

}

function checkType(){
    let val = document.forms['sell-form']['type'].value.toLowerCase();
    let des = document.getElementById('type');
    let pos = type.indexOf(val);
    des.innerHTML = "TYPE";
    if(pos <0){
        des.innerHTML = "==> Loại này không hợp lệ, vui lòng điền lại";
        return false;
    }
    else{
        des.innerHTML = "";
        return true;
    }

}


function onSubmit(){   
    var x1 = checkColor();
    var x2 = checkType();
}


