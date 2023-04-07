<!DOCTYPE html>
<html>
<head>
		<!--mmc175 P1-->
		<style>body {
	font-family: Arial;
}
</style>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		
</head>
<body>

<h1>Bloomberg Terminal Clone</h1>
		
	
	
		<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
			<div class="container-fluid">
				<a style="color: white; font-size: 32px;">Bloomberg Terminal Clone</a>
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
		</nav>

		<!--Div below is background image-->
		<div class="img-fluid bg-image" style="background-image: url('https://preview.redd.it/wbnn4jk6p9j31.jpg?width=960&amp;crop=smart&amp;auto=webp&amp;v=enabled&amp;s=1b8015314aa6d62d0033eadaaadca24a6e9dc338'); width: 100vw; height: 100vh; background-size: cover; background-repeat: no-repeat; background-attachment: fixed; z-index:0;">
		<!--Div container below contains two inline divs-->
		<div class="container d-flex justify-content-center overflow-auto" id="wrappercontainer" style="width: 100%;">
		<div class="d-inline-block overflow-auto" id="leftcontainer" style="width: 50%; max-width: 50%; height: 100vh; max-height: 100vh; ">
		<br>
		<h3 id="sdanchor">Find Stock Data Here</h3>
		<div class="d-flex">
		<textarea id="textinput" placeholder="Enter" rows="5" cols="60"></textarea>	
		</div>
		<input id="textinputsubmit" type="submit" method="POST">

		
		<br>
		<h3>JSON into URLS and Titles</h3>
		<div class="d-flex">
		<textarea id="jsoninput" placeholder="Enter JSON here" rows="15" cols="60"></textarea>
		</div>

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
					<p>Uses Polygon.io API</p>

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
		<h1>Messages</h1>
		<input type="text" id="useraddr" rows="1" cols="20" placeholder="">
		<input type="text" id="addressarea" rows="1" cols="20" placeholder="email address">
		<textarea id="msgarea" rows="8" cols="60" placeholder="Send email Message from Here"></textarea>
		<br>
		<input type="submit" value="send">	
		</div>	

		<!--Div container endtag that contains the two inline divs-->
		</div>	
		<!--This is the background div end tag-->
		</div>


				<script>
			function clearTextArea(name){
				let tatbc = document.getElementById(name);
				tatbc.value = "";
			}

			function searchInvp(){
				let queryName = document.getElementById('searchinvestopedia').value;
				clearTextArea('searchinvestopedia');
				window.open('https://www.investopedia.com/search?q=' + queryName);
			}

			//modal script

		</script>
	

</body>
</html>