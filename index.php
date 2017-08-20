<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<title>Pusher Demo | Using JS</title>
	<script>

		var pusher = new Pusher('308ec3a55dfd284497af',  {
			cluster: 'ap2',
			encrypted: false
		});

		var channel = pusher.subscribe('my-channel');

		channel.bind('my-event', function(response) {
			var message = document.getElementById('displayData');
			message.innerHTML = message.innerHTML+ "<tr><td>"+response.name+"</td><td>"+response.message+"</td></tr><tr><td colspan='2'><hr size='1' color='#e1e1e1'></td></tr>";
		});

	</script>
</head>
<body>
	<div id="wrapper">
		<h3>Pusher Demo</h3>
		<hr size="2" color="black">
		<h5></h5>

		<form action="notify.php" method="post">
			<table width="50%" border="0">
				<tr>
					<td width="45%">Name</td>
					<td>:</td>
					<td width="45%"><input class="full_w" type="text" name="txtName"></td>
				</tr>
				<tr>
					<td>Message</td>
					<td>:</td>
					<td><textarea class="full_w" name="txtMessage"></textarea></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td>
						<input class="half_w" type="Submit" value="Send">&nbsp;
						<input class="half_w" type="Reset" value="Reset">
					</td>
				</tr>
			</table>
		</form>
		<hr size="2" color="black">
		<h3>Your Messages</h3>
		<hr size="1" color="#a1a1a1">
		<div>
			<table id="displayData" width="100%">
				<tr>
					<td><b>Name</b></td>
					<td><b>Message</b></td>
				</tr>
				<tr>
					<td colspan="2"><hr size="1" color="a1a1a1"></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>