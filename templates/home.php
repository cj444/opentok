<html>
<head>
    <title> OpenTok Getting Started </title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
</head>
<body>
<div id="login" style="width:50%;align:center;">
<input type="text" id="roomname" style="width:70%;height:80px;"placeholder="Please Enter Room Name to publish a stream." >
<button id="go" >Go</button>
</div>
    <div id="videos" style="display:none;">
        <!-- <div id="subscriber"></div> -->
        <div id="publisher"></div>
    </div>
    <script>
	var channel = 'test1';
	</script>
    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>