var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");

document.querySelector('.password-field').addEventListener('keyup', passwordCheck);
document.querySelector('#correct').style.display = 'none';
function passwordCheck(){
    var inputval = document.querySelector('.password-field').value;
    let filtered = regex.test(inputval);
    if(filtered == false){
        document.querySelector('.error').innerHTML = "Password too short";
        document.querySelector('#correct').style.display = 'none';
        document.querySelector('.password-field').style.borderColor = "red";
        
    }else{
        document.querySelector('.error').innerHTML = "";
        document.querySelector('#correct').style.display = 'block';
        document.querySelector('.password-field').style.borderColor = "";
    }
}
