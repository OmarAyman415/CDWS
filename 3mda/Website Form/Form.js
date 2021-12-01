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