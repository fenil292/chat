
<!DOCTYPE html>
<html>
<head>
	<title>Messanger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--<meta http-equiv="refresh" content="5" />-->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    p {
        margin-top: 5px;
        margin-button: 5px;
    }
body {
  margin: 0 auto;
  max-width: 100%;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding-left: 10px;
  margin: 2px 0;8
  width: 50%;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}
.time-left {
  float: left;
  color: #999;
}
</style>
</head>
<body>
<div style="text-align:center;position: inherit;top: 0;left: 0;z-index: 999;width: 100%;height: auto;background:white;">
    Mobile No: <br>
    Name: <span id="name"></span><br>
    <a href="logout.php">Logout</a>
</div>
<div style="width: 100%; height: 580px; overflow-y: scroll;" id="chat"> 
  
        <div class='container' style='width:50%;float:left;'><p><?php echo $m_data['msg']; ?></p><span class='time-right'><?php echo $m_data['time']; ?></span><div style='color:red;' class='time-right'><?php echo $name['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>
    
        <div class='container darker' style='float:right;width:50%;'><p><?php echo $m_data['msg']; ?></p><span class='time-left'><?php echo $m_data['time']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><div style='color:blue;' class='time-left'><?php echo $data['name']; ?></div></div>

</div>
<div style="width: 100%;">
    <input type="text" id="msgbox" style="width: 90%;" placeholder="Type a message" autofocus="autofocus">
    <button id="send" style="position: absolute;">Send</button><input type="number"  id="id" value="1" style="display:none;" disabled>
</div>

<!--<script src="/socket.io/socket.io.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.4.1/socket.io.js" integrity="sha512-MgkNs0gNdrnOM7k+0L+wgiRc5aLgl74sJQKbIWegVIMvVGPc1+gc1L2oK9Wf/D9pq58eqIJAxOonYPVE5UwUFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--<script src="../nodec.js"></script>-->
	<script>
	var socket = io();
$( "#send" ).click( function() {
	alert('jhbj');
	var m = $( "#msgbox" ).val();
	var name= document.getElementById('name');
	var t,user_id;
	m=m.trim();
	if(m!="")
	{
			
    socket.emit( 'message', { name: name.textContent, message: m, time: t} );
	}
	else
	{
		$('#msgbox').focus();
        document.getElementById('msgbox').value = "";
		alert('Tari ****,First Type a Message!');
	}           
	return false;
});
socket.on( 'message', function( data ) {
	var name= document.getElementById('name');
	var div = document.getElementById('chat');
	if(data.name==name.textContent)
    {
    	div.innerHTML += "<div class='container darker' style='float:right;width:50%;'><p>"+data.message+"</p><span class='time-left'>"+data.time+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><div style='color:blue;' class='time-left'>"+data.name+"</div></div>";
    }
    else
    {
    	div.innerHTML += "<div class='container' style='width:50%;float:left;'><p>"+data.message+"</p><span class='time-right'>"+data.time+"</span><div style='color:red;' class='time-right'>"+data.name+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
    }
    $('#chat').scrollTop($('#chat')[0].scrollHeight);
});
	</script>
</body>
</html>
