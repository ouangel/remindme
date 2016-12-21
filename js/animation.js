//////////////////////////////////////////
//////////// the main section ////////////
//////////////////////////////////////////
// function menu() {
	// console.log("pass");
	// var menu = document.getElementById("menuArea");
	// var main = document.getElementById("mainArea");

	// menu.style.display="block";
	// menu.style.transition="all 3s ease 3s";
	// main.style.display="none";

	// jQuery method

	// $(document).ready(function(){
	// 	setTimeout(function(){
	// 		$("#menuArea").show("2000")
	// 	}, 3000);
	// });
// }
// window.setTimeout(menu, 1500);

///////////////////////////////////
//////////// view page ////////////
///////////////////////////////////

// append close icon when add new to do list
// var list = document.getElementsByTagName("li");
// console.log("pass");
// for(var i=0; i<list.length; i++) {
// 	var span = document.createElement("span");
// 	var txt = document.createTextNode("\u00D7");
// 	span.className = "close";
// 	span.appendChild(txt);
// 	list[i].appendChild(span);
// }

// click on close icon and hide to do list item
var close = document.getElementsByClassName("close");
for(var i=0; i<close.length; i++) {
	close[i].onclick = function() {
		var div = this.parentElement;
		div.style.display = "none";
	}
}

// add check mark when click on to to list item
var check = document.querySelector("ul");
check.addEventListener("click", function(e){
	console.log("ok");
	if(e.target.tagName == "li") {
		e.target.classList.toggle("checked");
	}
}, false);

// create form datepicker
$( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "m/d",
    });
  } );

// drag and drop to to list item
$( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );

