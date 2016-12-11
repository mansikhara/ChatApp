<?php include 'db.php';?>
<!DOCTYPE html>
<html>
	<head>
		<title> CHAT APPLICATION </title>
		<script>
			function chat_ajax()
			{
				var req=new XMLHttpRequest();
				req.onreadystatechange=function()
				{
					if(req.readyState==4 && req.status==200)
					{
						document.getElementById('chat').innerHTML=req.responseText;

					}
				}
				req.open('GET','chat.php',true);
				req.send();
			}
			setInterval(function(){chat_ajax()},1000)
		</script>
	</head>

	<body onload="chat_ajax();"> 
		<div id="container">
			<div id="chat_box">
				<div id="chat">
					
				</div>
			</div>
		

			<form method="post" action="index.php">
				<label for="fn">Name</label>
					<input type="text" name="name"/>
				<textarea name="enter_message" placeholder="Enter Message"></textarea>
				<div id="subbtn">
				<input type="submit" name="submit" value="SEND" align="center" />
				</div>
			</form>

			<?php
				if(isset($_POST['submit']))
				{
					$name=$_POST['name'];
					$msg=$_POST['enter_message'];
					$query="INSERT INTO chat (name,msg) VALUES ('$name','$msg')";
					$run=$con->query($query);
				}
			?>
		</div>
		
	</body>

	<style>
	*{
		padding:0;
		margin:0;
		border:0;
	}
	body{
		background:silver;
	}
	#container
	{
		width:40%;
		background:white;
		margin:0 auto;
		padding:20px;
	}
	#chat_box
	{
		width:90%;
		height:400px;
	}
	#chat_data
	{
		width:100%;
		padding:5px;
		margin-bottom:5px;
		border-bottom:1px solid silver;
		font-weight:bold;
	}
	input[type="text"]
	{
		width:100%;
		height:40px;
		border:1px solid grey;
		border-radius: 5px;
	}
	textarea
	{
		width:100%;
		height:40px;
		border:1px solid grey;
		border-radius:5px;
	}
	
	#subbtn
	{
		width:500px;
		margin:auto;
		text-align: center;
	}
	</style>
</html>