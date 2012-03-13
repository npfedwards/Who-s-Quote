var http_request = false;
function CheckAuthor(id,a){
	http_request = false;
	if (window.XMLHttpRequest) { // Mozilla, Safari,...
	   http_request = new XMLHttpRequest();
	   if (http_request.overrideMimeType) {
		  // set type accordingly to anticipated content type
		  //http_request.overrideMimeType('text/xml');
		  http_request.overrideMimeType('text/html');
	   }
	} else if (window.ActiveXObject) { // IE
	   try {
		  http_request = new ActiveXObject("Msxml2.XMLHTTP");
	   } catch (e) {
		  try {
			 http_request = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (e) {}
	   }
	}
	if (!http_request) {
	   alert('Cannot create XMLHTTP instance');
	   return false;
	}
	var url="checkauthor.php";
	url=url+"?q="+id+"&a="+a;
	url=url+"&sid="+Math.random();
	http_request.onreadystatechange = alertContents;
	http_request.open('GET', url, true);
	http_request.send(null);
	
}

function newQuote(){
	http_request = false;
	if (window.XMLHttpRequest) { // Mozilla, Safari,...
	   http_request = new XMLHttpRequest();
	   if (http_request.overrideMimeType) {
		  // set type accordingly to anticipated content type
		  //http_request.overrideMimeType('text/xml');
		  http_request.overrideMimeType('text/html');
	   }
	} else if (window.ActiveXObject) { // IE
	   try {
		  http_request = new ActiveXObject("Msxml2.XMLHTTP");
	   } catch (e) {
		  try {
			 http_request = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (e) {}
	   }
	}
	if (!http_request) {
	   alert('Cannot create XMLHTTP instance');
	   return false;
	}
	var url="newquote.php?&sid="+Math.random();
	http_request.onreadystatechange = updateContents;
	http_request.open('GET', url, true);
	http_request.send(null);
	
}

function alertContents(){
	if (http_request.readyState == 4) {
		if (http_request.status == 200) {
			//alert(http_request.responseText);
			result = http_request.responseText;
			if(!isNaN(result)){
				var c = parseInt(document.getElementById('con'+result).innerHTML);
				document.getElementById('con'+result).innerHTML=c+1;
				$('#author').fadeOut(1000, 'swing');
				
			}else{
				document.getElementById('response').innerHTML=result;
				$('#author').fadeOut(1000, 'swing', $('#response').fadeIn(1500, 'swing')); 
			}
		  
		  
			 //Put the result in the div
			
	 	} else {
			alert('There was a problem with the request.');
		}
	}
	
	
}

function updateContents(){
	if (http_request.readyState == 4) {
		if (http_request.status == 200) {
			//alert(http_request.responseText);
			result = http_request.responseText;
		  	
			$('#quoteholder').fadeOut(1000);
			setTimeout("document.getElementById('quoteholder').innerHTML=result",1000);
			$('#quoteholder').fadeIn(1000);
		  
	 	} else {
			alert('There was a problem with the request.');
		}
	}
	
	
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}

//Function for removing hint text and changing the class of inputs
function textboxOnFocus(input){
	var value=input.value;
	if(value === "Who said/wrote this?"){
		input.value="";
		$(input).addClass("hintTextboxActive");
	}
}