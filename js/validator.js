function check() {
  var login = document.getElementsByClassName("login")[0].value;
  if (login.length < 4) {
    document.getElementsByClassName("login")[0].style.border = "thick solid red";
  }

  var pass = document.getElementsByClassName("pass")[0].value;
  if (pass.length < 5) {
    document.getElementsByClassName("pass")[0].style.border = "thick solid red";
  }

  var phone = document.getElementsByClassName("phone")[0].value;
  if (phone.length < 11) {
    document.getElementsByClassName("phone")[0].style.border = "thick solid red";
  }
   
}
