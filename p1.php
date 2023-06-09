<!DOCTYPE html>
<html><head>
		<!--mmc175 P1-->
		<style>body {
	font-family: Arial;
}
</style>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		
		</head><body><h1>Bloomberg Terminal Clone</h1>
		
	
	
		<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
			<div class="container-fluid">
				<a style="color: white; font-size: 32px;">Bloomberg Terminal Clone</a>
				<div class="collapse navbar-collapse" id="coll">
    				<ul class="navbar-nav">
      					<li class="nav-item">
        					<a class="nav-link" href="#sdanchor">Stock Data</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#invpsbanchor">Investopedia Searchbar</a>
					</li>
      					<li class="nav-item">
        					<a class="nav-link" href="#">Documentation</a>
      					</li>
      					<li class="nav-item">
        					<a class="nav-link" href="https://stockanalysis.com/stocks/" target="_blank" rel="noreferrer noopener">Stock Ticker Symbols</a>
      					</li>
      					<li class="nav-item">
						<!--<a class="nav-link" href="">Help</a>-->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#helpModal">Help</button>

      					</li>
				</ul>
				</div>
				 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#coll" aria-controls="coll" aria-expanded="false">
                                        <span class="navbar-toggler-icon"></span>
                                </button>
  			</div>
		</nav>

		<!--Div below is background image-->
		<div class="img-fluid bg-image" style="background-image: url('https://preview.redd.it/wbnn4jk6p9j31.jpg?width=960&amp;crop=smart&amp;auto=webp&amp;v=enabled&amp;s=1b8015314aa6d62d0033eadaaadca24a6e9dc338'); width: 100vw; height: 100vh; background-size: cover; background-repeat: no-repeat; background-attachment: fixed; z-index:0;">
		<!--Div container below contains two inline divs-->
		<div class="container d-flex justify-content-center overflow-auto" id="wrappercontainer" style="width: 100%;">
		<div class="d-inline-block overflow-auto" id="leftcontainer" style="width: 50%; max-width: 50%; height: 100vh; max-height: 100vh; ">
		<br>
		<p style="color: white;">
		</p>
		<h3 id="sdanchor">Find Stock Data Here</h3>
		<div class="d-flex">
		<!--Polygon.io parameters-->
		<div class="container block">
		<input type="text" id="sd1" rows="1" cols="20" placeholder="STOCKTICKER SYMBOL">
		<input type="text" id="sd2" placeholder="MULTIPLIER">
		<input type="text" id="sd3" placeholder="TIMESPAN">
		<input type="text" id="sd4" placeholder="FROM">
		<input type="text" id="sd5" placeholder="TO">
		<input type="text" id="sd6" placeholder="ADJUSTED">
		<input type="text" id="sd7" placeholder="SORT">
		<input type="text" id="sd8" placeholder="LIMIT">
		<input type="text" id="sd9" placeholder="API KEY">
		</div>		
		<textarea id="textinput" placeholder="Stock data appears here..." rows="5" cols="60"></textarea>
		<br>
		</div>
		<input id="textinputsubmit" type="submit" onclick="callPolygon();">
		
		<br>
		<h3>Direct Query</h3>
		<div class="d-flex">
		<input type="text" id="dqarea" rows="1" cols="60" placeholder="Enter complete query">
		</div>
		<input id="dqinput" type="submit" value="Submit" onclick="queryDirect();">

		<br>
		<h3>JSON into URLS and Titles</h3>
		<div class="d-flex">
		<textarea id="jsoninput" placeholder="Enter JSON here" rows="15" cols="60"></textarea>
		</div>
		<input id="newsjsonbtn" type="submit" value="Enter" onclick="newsAPIJSON();">

		<br>
		<h3 class="text-white" id="invpsbanchor">Investopedia Searchbar</h3>
		<p class="text-white">Unfamiliar with something?  Check Investopedia</p>
		
		<div class="d-flex">
		<textarea id="searchinvestopedia" placeholder="Search Investopedia"></textarea>
		<input id="queryinvped" type="submit" onclick="searchInvp();">
		</div>		

		<br>


		<!-- Modal -->
		<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog modal-xl modal-dialog-scrollable">
    				<div class="modal-content">
      					<div class="modal-header">
        					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      					</div>
      					<div class="modal-body">
					<h1>Help Documentation</h1>
					<h3>Tools</h3>
					<h5>Stock Data lookup</h5>
					<p>Enter up to 5 stock ticker symbols separated by commas to receive data.  API rate is 5 calls per minute.  Default call</p>
					<p>Stock Data by Symbol</p>
					<ol>
						<li>c - close price for stock during given time period</li>
						<li>h - highest price during time period</li>
						<li>l - lowest price during given time period</li>
						<li>n - number of transactions in aggregate window</li>
						<li>t - Unix Msec timestamp</li>
						<li>v - trading volume during given time period</li>
						<li>vw - volume weighted average price</li>
					</ol>
					<p>
					</p><ol>
						<li></li>
					</ol>
					Sample query: https://api.polygon.io/v2/aggs/ticker/AAPL/range/1/day/2023-01-09/2023-01-09?adjusted=true&amp;sort=asc&amp;limit=120&amp;apiKey=(API key goes here)
Query Results:
{"ticker":"AAPL","queryCount":1,"resultsCount":1,"adjusted":true,"results":[{"v":7.0790813e+07,"vw":131.6292,"o":130.465,"c":130.15,"h":133.41,"l":129.89,"t":1673240400000,"n":645365}],"status":"OK","request_id":"dc6f474d20957d41aeb52ec1a27e439f","count":1}					<p>Uses Polygon.io API</p>

					<h3>News API tool</h3>
					<p></p>
					<p></p>

					<h3>Investopedia Searchbar</h3>
					<p>Enter a query as if you were searching the Investopedia website directly.  Query will be opened in a new tab.</p>

					<p>Can also be used to search for the major shareholders of companies.  Standard form is "Top ___ Shareholders".</p>

					<h2>Configuration</h2>
					<ul>
						<li> polykey = Polygon.io API key.  Receive from <a class="link-primary" style="display: inline;" href="https://polygon.io/" target="_blank" rel="noreferrer noopener">https://polygon.io/</a></li>
						<li> newskey = NewsAPI API key.  Receive from <a class="link-primary" style="display: inline;" href="https://newsapi.org/" target="_blank" rel="noreferrer noopener">https://newsapi.org/</a></li>
						<li></li>
					</ul>

					
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      				</div>
    			</div>
  			</div>
		</div>		



		</div>


		<div class="d-inline-block overflow-auto" id="rightcontainer" style="width: 50%; max-width: 50%; height: 100vh; max-height: 100vh;">

		<br>
		<h1>Notepad</h1>
		<textarea id="notepad" rows="5" cols="60" style="overflow: auto;"></textarea>
		<br>
		<input id="clrnp" type="submit" value="Clear">

		<br>
		<h1>Messages</h1>
		<input type="text" id="useraddr" rows="1" cols="20" placeholder="FROM">
		<br>
		<input type="text" id="addressarea" rows="1" cols="20" placeholder="TO">
		<textarea id="msgarea" rows="8" cols="60" placeholder="MESSAGE GOES HERE"></textarea>
		<br>
		<input type="submit" value="send" onclick="sendEmail();">
		
		<br>
		<h1></h1>
		<p></p>
		
		<!--This was for educational purposes, I swear-->
		<button id="pbm" type="button" class="btn btn-success" onclick="pbmmode()">Bateman Mode</button>
		<img id="mrbateman" src="https://e1.pxfuel.com/desktop-wallpaper/632/204/desktop-wallpaper-american-psycho-backgrounds-patrick-bateman.jpg" class="d-none">
		<iframe id="htbs" class="d-none" width="420" height="315" src="https://www.youtube.com/embed/LB5YkmjalDg?playlist=LB5YkmjalDg&amp;autoplay=1&amp;mute=1&amp;loop=1"></iframe>
		</div>	

		<!--Div container endtag that contains the two inline divs-->
		</div>	
		<!--This is the background div end tag-->
		</div>


				<script>

			var clearNPBTN = document.getElementById('clrnp');
			clearNPBTN.addEventListener('click', function(){
				document.getElementById('notepad').value = "";
			});



			function clearTextArea(name){
				let tatbc = document.getElementById(name);
				tatbc.value = "";
			}

			function searchInvp(){
				let queryName = document.getElementById('searchinvestopedia').value;
				clearTextArea('searchinvestopedia');
				window.open('https://www.investopedia.com/search?q=' + queryName);
			}

			
			//print to stock data area
			function printToSDA(item){
				//Write call results to textinput
				let res = item.results;
			       	let contents = document.getElementById('textinput').value;	
				for(i=0; i<res.length; i++){
					//console.log(res[i]);
					for(let info in res[i]){
						//console.log(res[i][info]);
						let newline = info + ": " + res[i][info] + "\n";
						document.getElementById('textinput').value += newline;		
					}
				}
			}

			//Call Polygon.io API for stock data
			function callPolygon(){
				//Can make 5 requests per minute due to API free dev plan constraints
				let s1 = document.getElementById('sd1').value;
                                let s2 = document.getElementById('sd2').value;
                                let s3 = document.getElementById('sd3').value;
                                let s4 = document.getElementById('sd4').value;
                                let s5 = document.getElementById('sd5').value;
                                let s6 = document.getElementById('sd6').value;
                                let s7 = document.getElementById('sd7').value;
                                let s8 = document.getElementById('sd8').value;
                                let s9 = document.getElementById('sd9').value;

				var q = "https://api.polygon.io/v2/aggs/ticker/" + s1 + s2 + s3 + s4 + s5 + s6 + s7 + s8 + s9;
				//console.log(q);
				fetch(q).then(response => response.json()).then(data => printToSDA(data)).catch(error => console.error(error));
			}

			//Technically has its own input, but prints to stock data input regardless
			function queryDirect(){
				let directQuery = document.getElementById('dqarea').value;
				console.log(directQuery);
				//call Polygon.io API
				fetch(directQuery).then(response => response.json()).then(data => printToSDA(data)).catch(error => console.error(error));	
			}

			//only handles one at time so far
			function newsAPIJSON(){
				let jsonItem = document.getElementById('jsoninput').value;
				//console.log(typeof jsonItem);
				jsonItem = JSON.parse(jsonItem);
				//console.log(typeof jsonItem);
				let finalResult = jsonItem["title"] + ": " + "\n" + jsonItem["content"] + "\n" + " ||URL: " + jsonItem["url"];
				document.getElementById('jsoninput').value = finalResult;
			}
			
			//Patrick Bateman Mode
			function pbmmode(){
				let value = document.getElementById('mrbateman').className;
				console.log(value);
				if(value == "d-none"){
					document.getElementById('mrbateman').className = "img-fluid";
					document.getElementById('htbs').className = "";
				} else {
					document.getElementById('mrbateman').className = "d-none";
					document.getElementById('htbs').className = 'd-none';
				}
			}

		</script>

		<script src="https://smtpjs.com/v3/smtp.js">
		</script>
		<script type="text/javascript">
			function sendEmail() {
      				Email.send({
        				Host: "smtp.gmail.com",
        				Username: "mmc175",
        				Password: "sdfsdfsfaew terg dfasd",
        				To: 'mmc175@case.edu',
       					From: "mmc175@case.edu",
        				Subject: "Sending Email using javascript",
        				Body: "pain",
      				})
        			.then(function (message) {
          				alert("mail sent successfully")
        			});
    			}
		</script>
	

</body></html>