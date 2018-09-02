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

    <div id="videos">
	     <div style="width:40%;">
		    <p>http://chetanphp.herokuapp.com/room/test</p>
            <div id="test"></div> 
		 </div>
		   <div style="width:40%;">
				<p>http://chetanphp.herokuapp.com/room/test1</p>
				<div id="test1"></div> 
		   </div>
    </div>
    <script>
	    var SERVER_BASE_URL = 'https://chetanphp.herokuapp.com';
	  
	  
	    myFunction('test');
    function myFunction(channel) { 
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

  var session = OT.initSession(apiKey, sessionId);

  // Subscribe to a newly created stream
     session.on('streamCreated', function(event) {
   console.log("New stream in the session: " + event.stream.streamId);
   //alert(event.stream.streamId);
   session.subscribe(event.stream, channel, {
    insertMode: 'append',
    width: '20%',
    height: '20%'
  }, handleError); 
}); 
session.on("streamDestroyed", function (event) {
  console.log("Stream stopped. Reason: " + event.reason);
});
 
  session.connect(token, function(error) { 
  });
}
</script>
   
</body>
</html>