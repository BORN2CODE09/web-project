function myFunction() {
  var txt = "";
  var log = document.getElementById("login").value;
  var pas = document.getElementById("pass").value;
  if (log.length < 4) {
    document.getElementById("login").style.border = "thick solid red";
  }
  if (pas.length < 5) {
    document.getElementById("pass").style.border = "thick solid red";
  }
  //document.getElementById("onError").innerHTML = txt;
}