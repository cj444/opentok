// replace these values with those generated in your TokBox Account
var apiKey = "YOUR_API_KEY";
var sessionId = "YOUR_SESSION_ID";
var token = "YOUR_TOKEN";

// (optional) add server code here
// (optional) add server code here
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
// Handling all of our errors here by alerting them
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
/*   session.subscribe(event.stream, 'subscriber', {
    insertMode: 'append',
    width: '100%',
    height: '100%'
  }, handleError); */
}); 
   
  
  // Create a publisher
  var publisher = OT.initPublisher('publisher', {
    insertMode: 'append',
    width: '100%',
    height: '100%'
  }, handleError);

  // Connect to the session
  session.connect(token, function(error) {
    // If the connection is successful, publish to the session
    if (error) {
      handleError(error);
    } else {
      session.publish(publisher, handleError);
	  document.getElementById("videos").style.display = "block";
	  document.getElementById("login").style.display = "none";
    }
  });
}