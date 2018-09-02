<html>
<head>
    <title> OpenTok Getting Started </title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
</head>
<body>
<style>
#go{background-color: green;
border: solid;
padding: 6px;
width: 10%;
font-size: 16px;}
</style>
<div id="login" style="width:100%;text-align:center;">
<input type="text" id="roomname" style="width:20%;height:46px;" placeholder="Please Enter Room Name to subscribe a stream." >
<button id="go" >Go</button>
</div>
    <div id="videos">
         <div id="subscriber"></div> 
    </div>
    <script>
	    var SERVER_BASE_URL = 'https://chetanphp.herokuapp.com';
	    var buttongo = document.getElementById("go");
	  
	      buttongo.onclick = myFunction;
    function myFunction() { 
           var channel = document.getElementById("roomname").value;	
      		fetch(SERVER_BASE_URL + '/room/'+channel).then(function(res) {
			  return res.json()
			}).then(function(res) {
			  apiKey = res.apiKey;
			  sessionId = res.sessionId;
			  token = res.token;
			  initializeSession();
			}).catch(handleError);
   }
   
   function handleError(error) {
  if (error) {
    alert(error.message);
  }
}

function initializeSession() {
alert(apiKey);
  var session = OT.initSession(apiKey, sessionId);

  // Subscribe to a newly created stream
  
   session.on('streamCreated', function(event) {
  session.subscribe(event.stream, 'subscriber', {
    insertMode: 'append',
    width: '100%',
    height: '100%'
  }, handleError);
});
  

}
</script>
   
</body>
</html>