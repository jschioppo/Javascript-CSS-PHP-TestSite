<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>
	</title>
	<link rel = "stylesheet" href="/PHPPlayground/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<script type="text/javascript">	
	$(document).ready(function() {
		searchBtn.onclick = function(){
			var str = document.getElementById("searchField").value;
			location.href = "https://www.google.com/search?q=" + str;
		};
		
		
		function getNum(){
			getNum.num++;
			return getNum.num % 5;
		}
		
		getNum.num = -1;
		
		gifBtn.onclick = function(){
			var randomNum = getNum();
			switch(randomNum) {
				case 0:
					document.getElementById("gifSpace").src = "/PHPPlayground/gifs/numZero.gif";
					break;
				case 1:
					document.getElementById("gifSpace").src = "/PHPPlayground/gifs/numOne.gif";
					break;
				case 2:
					document.getElementById("gifSpace").src = "/PHPPlayground/gifs/numTwo.gif";
					break;
				case 3:
					document.getElementById("gifSpace").src = "/PHPPlayground/gifs/numThree.gif";
					break;
				case 4:
					document.getElementById("gifSpace").src = "/PHPPlayground/gifs/numFour.gif";
					break;
			}
			gifDiv.hidden = false;
		}
		
		clearBtn.onclick = function(){
			gifDiv.hidden = true;
			getNum.num = -1;
		}
	});
	
</script>

<body>
<div class="search-engine">
	<p style = "color: blue; margin-bottom: 0px;" >Not Google</p>
	<input type="text" class = "search-bar" style="width: 300px;" id="searchField"/>
	
	<div class="buttons-group">
		<button class="button" id="searchBtn" style="width: 150px;">Search</button><button class= "button" id="gifBtn" style="width: 150px; margin-left:5px;">Give me a gif</button>
	</div>
</div>


<div style="height: 1000px; text-align: center; margin-top: 50px;" hidden = true id = "gifDiv">
	<img id="gifSpace">
	<br></br>
	<button id="clearBtn">Clear</button>
</div>
</body>





