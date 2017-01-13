function loadText(){
	var selected = document.getElementById('selector').value;
	var paragraph = document.getElementById("info");
	switch(selected){
		case "from":
			paragraph.innerHTML = "I am from a small oil-field town in Colorado Named Rangely. Population: 3000 +/-.";
			break;
		case "family":
			paragraph.innerHTML = "There are 6 people in my family, I am the second of four children. My older brother is at BYUI and lives with me, my younger brother is finishing his associates, and my sister is a junior in high school. My dad is a lineman, my mom works as a secretary for an oil company.";
			break;
		case "school":
			paragraph.innerHTML = "This is my third semester at BYU Idaho, although I am a senior since I transfered with an associates of science from Colorado Northwestern Community College, also located in Rangley (strange as it is for such a small town.)";
			break;
		case"interests":
			paragraph.innerHTML = "I really like to do things outdoors, although I'm not much of a winter guy. I like to camp, fish, hike, that kind of thing. I also really enjoy watching football, I am a Dallas Cowboys fan from way back when they weren't doing very well. I like to play sports also, when I get the chance.";
			break;
		default:
			paragraph.innerHTML = " ";
			break;
			
	}
	
}