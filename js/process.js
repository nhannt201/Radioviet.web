
//Process function
var full_c = 0;
function mode_listen() {
	if (full_c == 0 ) {
		document.getElementById("radio_img_div").className = "radio_img";
		document.getElementById("radio_img_div").style.display = "block";
		document.getElementById("radio_img_src").className = "img_stream_show";
		document.getElementById("radio_stream").className = "radio bg-dark mode-full";
		document.getElementById("radio_player").className = "radio_player";
		document.getElementById("img_mode").src = "https://i.imgur.com/Ibi8AGU.png";
		document.getElementById("mode_section").className = "mode_section mode_section_2";
		document.getElementById("menu_will").style.display = "none";
		full_c = 1;
	} else {
		document.getElementById("radio_img_div").className = "";
		document.getElementById("radio_img_div").style.display = "none";
		document.getElementById("radio_img_src").className = "";
		document.getElementById("radio_stream").className = "radio bg-dark";
		document.getElementById("radio_player").className = "";
		document.getElementById("img_mode").src = "https://i.imgur.com/XcRANIm.png";
		document.getElementById("mode_section").className = "mode_section";
		document.getElementById("menu_will").style.display = "block";
		full_c = 0;
	}
	
}
function getReturn(url_get, idget="", start="", end="") {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		
	  if (this.readyState == 4 && this.status == 200) {	
			if (idget.length > 0) {
				if (document.getElementById(idget)) { // Check xem ID co ton tai khong
					document.getElementById(idget).innerHTML =  start + this.responseText + end;
				}		else {
						
				}
			}
	  }
	};
	xhttp.open("GET", url_get, true);
	xhttp.send();
}

//Check Internet
window.addEventListener("offline", (event) => {
	//alert("Ofline");
	document.getElementById("include_all").style.display = "none";
	document.getElementById("note_st").style.display = "block";
});

window.addEventListener("online", (event) => {
 // alert("Online");
	document.getElementById("include_all").style.display = "block";
	document.getElementById("note_st").style.display = "none";
});