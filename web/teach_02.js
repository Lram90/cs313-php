function clicked(){
	alert("Clicked!")
}

function changeColor(){
	var box = document.getElementById("first");
	var newColor = document.getElementById("newColor").value;
	box.style.backgroundColor = newColor;
}