<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Exercise Tracker</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>
<body>
	<div class="container">
		<h1>Exercise tracker</h1>
			<div class="forms">
				<div class="form-1">
					<form action="/public/api/exercise/new-user" method="post">
						<h3>Create a New User</h3>
						<p><code>POST /api/exercise/new-user</code></p>
						<label for="username">Username</label>
						<input id="uname" type="text" name="username" required>
						<input type="submit" value="Submit">
					</form>
				</div>
				<div class="form-2">
					<form action="/public/api/exercise/add" method="post">
						<h3>Add exercises</h3>
						<p><code>POST /api/exercise/add</code></p>
						<label for="userID">userId</label>
						<input id="userId" type="number" name="userId" required>
						<label for="description">Description</label>
						<input id="description" type="text" name="description" required>
						<label for="duration">Duration</label>
						<input id="duration" type="text" name="duration" placeholder="in minutes" required>
						<label for="date">Date</label>
						<input id="date" type="text" name="date" placeholder="date formta: (yyyy-mm-dd)">
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
			<p><strong>GET users's exercise log: </strong><code>GET /api/exercise/log?{userId}[&amp;from][&amp;to][&amp;limit]</code></p>
			<p><strong>{ }</strong> = required, <strong>[ ]</strong> = optional</p>
			<p><strong>from, to</strong> = dates (yyyy-mm-dd); <strong>limit</strong> = number</p>
	</div>
</body>
</html>
