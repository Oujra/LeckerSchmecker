let toggle = false;

let togglelogbar = function(){
  let getSidebar = document.querySelector(".loginregsidebar");

  if(toggle === false){
    getSidebar.style.visibility = "visible";
    getSidebar.style.width = "120px";
    toggle = true;
    }
    else if (toggle === true){
      getSidebar.style.visibility = "hidden";
      toggle = false;
    }
}
/*von W3school kopiert */
function opnenewsmodal(){
  // Get the modal
var modal = document.getElementById("modal-newsletter");
modal.style.display = "block";
var span = document.getElementsByClassName("close")[0];

//  <span> (x)modal schließen
span.onclick = function() {
  modal.style.display = "none";
}

// außerhalb modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
}



function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
