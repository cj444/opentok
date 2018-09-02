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
	     <div style="width:40%;float:left;">
		    <p>http://chetanphp.herokuapp.com/room/test</p>
            <div id="test"></div> 
		 </div>
		   <div style="width:40%;float:left;">
				<p>http://chetanphp.herokuapp.com/room/test1</p>
				<div id="test1"></div> 
		   </div>
    </div>
    <script>
	    var SERVER_BASE_URL = 'https://chetanphp.herokuapp.com';
	  
	  
	    myFunction('test');
	    myFunction('test1');
    function myFunction(channel) { 
         	fetch(SERVER_BASE_URL + '/room/'+channel).then(function(res) {
			  return res.json()
			}).then(function(res) {
			  apiKey = res.apiKey;
			  sessionId = res.sessionId;
			  token = res.token;
			  initializeSession(channel);
			}).catch(handleError);
   }
   
   function handleError(error) {
  if (error) {
    alert(error.message);
  }
}

function initializeSession(channel) {

  var session = OT.initSession(apiKey, sessionId);

  var connectionCount;
session.on({
  connectionCreated: function (event) {
       console.log("existing stream in the session: " + event.stream.streamId);
    connectionCount++;
    if (event.connection.connectionId != session.connection.connectionId) {
      console.log('Another client connected. ' + connectionCount + ' total.');
    }
  },
  connectionDestroyed: function connectionDestroyedHandler(event) {
    connectionCount--;
    console.log('A client disconnected. ' + connectionCount + ' total.');
  }
});
  
  
  // Subscribe to a newly created stream
     session.on('streamCreated', function(event) {
   console.log("New stream in the session: " + event.stream.streamId);
   //alert(event.stream.streamId);
   session.subscribe(event.stream, channel, {
    insertMode: 'append',
    width: '100%',
    height: '50%'
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