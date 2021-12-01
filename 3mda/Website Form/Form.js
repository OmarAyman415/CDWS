var radios = document.getElementsByName("rad2");
var form =  document.getElementById("Hidden");

document.getElementById("Hidden").style.display = 'block';

for(var i = 0; i < radios.length; i++) {
    radios[i].onclick = function() {
      var val = this.id;
    }
}