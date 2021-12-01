<<<<<<< HEAD
function myfunction3() {
  var x = document.getElementById("radio2");
  var form = document.getElementById("Hidden");
  var z = document.getElementsByClassName("secondary");
  if (x.checked === true) {
    form.style.display = "block";
    document.getElementById("idnumber").setAttribute("required", "");

    document.getElementById("phonenumber").setAttribute("required", "");
    document.getElementById("roomnumber").setAttribute("required", "");
    document.getElementById("emailaddress").setAttribute("required", "");
  }
}

function myfunction4() {
  var y = document.getElementById("radio1");
  var form = document.getElementById("Hidden");
  if (y.checked === true) {
    form.style.display = "none";
    document.getElementById("idnumber").removeAttribute("required");

    document.getElementById("phonenumber").removeAttribute("required");
    document.getElementById("roomnumber").removeAttribute("required");
    document.getElementById("emailaddress").removeAttribute("required");
  }
}
=======
function myfunction3(){
  var x = document.getElementById("radio2");
  var form =  document.getElementById("Hidden");

  if(x.checked === true){
    form.style.display = 'block';
  }
}

function myfunction4(){
  var y = document.getElementById("radio1");
  var form =  document.getElementById("Hidden");

  if(y.checked === true){
    form.style.display = 'none';
  }
}
>>>>>>> 19e5c32a2f62609d84bea68f7ecb6da4931eab96
