function show_hide_password1(target){
  var input1 = document.getElementById('password-input1');
    if (input1.getAttribute('type') == 'password') {
      target.classList.add('view');
      input1.setAttribute('type', 'text');
    } else {
      target.classList.remove('view');
      input1.setAttribute('type', 'password');
    }
  return false;
}

function show_hide_password2(target){
    var input2 = document.getElementById('password-input2');
        if (input2.getAttribute('type') == 'password') {
            target.classList.add('view');
            input2.setAttribute('type', 'text');
        } else {
            target.classList.remove('view');
            input2.setAttribute('type', 'password');
        }
        return false;
}

function show_hide_password3(target){
    var input3 = document.getElementById('password-input3');
        if (input3.getAttribute('type') == 'password') {
            target.classList.add('view');
            input3.setAttribute('type', 'text');
        } else {
            target.classList.remove('view');
            input3.setAttribute('type', 'password');
        }
        return false;
}

function validateForm1() {
  var l = document.forms["myForm1"]["login"].value;
  var n = document.forms["myForm1"]["name"].value;
  var ps = document.forms["myForm1"]["password"].value
  var p = document.forms["myForm1"]["pass"].value
  if (l == "" || n == "" || ps == "" || p == "") {
    alert("Не все поля заполнены");
    return false;
  }
  if (p!=ps) {
    alert("Пароли не совпали");
    return false;
  }
}

function validateForm2() {
    var l = document.forms["myForm2"]["login"].value;
    var ps = document.forms["myForm2"]["password"].value;
    if (l == ""  || ps == "" ) {
      alert("Не все поля заполнены");
      return false;
    }
}


