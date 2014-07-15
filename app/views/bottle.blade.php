<html>
<head>
	<title>Bottle View</title>
</head>
<body>

	<h1>Bottle View</h1>

	<form action="POST">
		<label for="bottleStart">Bottle Start</label><br>
		<button name="bottleStart" id="bottleStart">Start</button><br>
	</form>

	<form action="POST">
		<label for="bottleStop">Bottle Stop</label><br>
		<button name="bottleStop" id="bottleStop">Stop</button><br>
	</form>

	<form>

		<label for="ounces">Ounces</label>
		<input type="text" name="ounces" id="ounces" size="5" maxlength="5">
		<button type="submit" class="submit">Submit</button>

	</form>
	<form>
		<label for="notes">Notes</label><br>
		<textarea name="notes" class="notes" type="text"></textarea><br>
		<button type="submit" class="submit">Submit</button>
	</form>

</body>
</html>