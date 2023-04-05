<!DOCTYPE html>
<html>
<head>
<h1>News API proxy</h1>
</head>
<body>

<div>
<div style="display: inline-block; border: 1px solid black; vertical-align: top; padding: 10px 10px;">
<p>Enter Search Filters</p>
<input type="text" id="what" placeholder="(1) What you Want"><br>
<input type="text" id="where" placeholder="(2) From Where"><br>
<input type="text" id="r" placeholder="(3) Regarding"><br>
<input type="text" id="when" placeholder="(4) From When"><br>
<input type="text" id="sortedby" placeholder="(5) Sort By"><br>
<input type="text" id="key" placeholder="(6) Enter API key here"><br>
<input id="callapi" type="submit" onclick="makeCall();"></input>
</div>
<div style="display: inline-block; border: 1px solid black; vertical-align: top; padding: 2rem 2rem;">
<p>How to use this application</p>
<ol>
<li> Enter filter(s) in the appropriate inputs
<li> Enter API key
<li> Hit button, get results, copy paste to eecslab-22
</ol>
</div>
<div style="display: inline-block; border: 1px solid black; vertical-align: top; padding: 2rem 2rem;">
<p>Example commands</p>
<ul>
<li> Enter filter(s)
<li> Enter API key, hit button
<li> Get results, copy paste to eecslab-22
</ul>
</div>
</div>

<br>
<textarea id="displayarea" rows="20" cols="100" style="overflow:auto;" placeholder="JSON objects from API will appear here"></textarea>

<script>

function makeCall(){
//define url
var base = 'https://newsapi.org/v2/';
var whatYouWant = document.getElementById('what').value;
var whereYouWant = document.getElementById('where').value;
var reg = document.getElementById('r').value;
var whenYouWant = document.getElementById('when').value;
var sortYouWant = document.getElementById('sortedby').value;
var apikey = document.getElementById('key').value;

let newURL = base + whatYouWant + whereYouWant + reg + whenYouWant + sortYouWant + apikey;




//try catch statement after grabbing modifiers
try {
var req = new Request(newURL);
fetch(req).then(req => req.json()).then(data => textdisplay(data.articles));
}
catch (err){
document.getElementById('displayarea').value = 'An error ' + err + ' occured';
}
}


/*
let disp = document.getElementById('displayrea');
//NewsAPI code
var url = 'https://newsapi.org/v2/top-headlines?' +
          'country=us&' +
          'apiKey=35eb640db604410cbd90f29a5d14dc1b';
var req = new Request(url);
fetch(req).then(req => req.json()).then(data => textdisplay(data.articles));
*/


function textdisplay(data){
//console.log(data);

//TODO new idea nested for loops bc you can't print out an object
for (i=0;i<data.length;i++){
	//.author
	//console.log(JSON.stringify(data[i]));
	// Adds items to textarea
	document.getElementById('displayarea').value = document.getElementById('displayarea').value + JSON.stringify(data[i]);
	document.getElementById('displayarea').value += "\n";
	document.getElementById('displayarea').value += "\n";
	//TODO figure this out
	for(j=0;j<data[i].length;j++){
		console.log(data[i].description);
	}
}
}

//Ignore this for later
//data is the object, you need to get the item by it's number first THEN pull the other data out
//for (i=0;i<data.length;i++) {
//document.getElementById('displayarea').value = document.getElementById('displayarea').value + "\n" + data[i];
//}


//for (let article in data){
//add these to the text area
//document.getElementById('displayarea').value = document.getElementById('displayarea').value + "\n" + article;
//}



</script>
</body>
</html>