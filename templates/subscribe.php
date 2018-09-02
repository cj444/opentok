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

    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>