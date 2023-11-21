


function myFunction() {
    var x = document.getElementById("myDIV");
    var loginBtn = document.getElementById("login-btn");
  if (x.style.display === "none") {
    x.style.display = "block";
   // x.style.top = (loginBtn.offsetTop + loginBtn.offsetHeight) + "px";
   // x.style.left = loginBtn.offsetLeft + "px";
  } else {
    x.style.display = "none";
    }
  }

  function showRegister(x) {
    var register = $('#container_register'+x);
    var con = $('#con'+x);
    con.hide();
    register.toggle();
    //document.getElementById("container0").style.display = "none";
    //document.getElementsByClassName("con")[0].style.display = "none";
    //iconOption.show()

}
