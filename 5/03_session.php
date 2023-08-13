<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Session Example</title>
</head>
<body>
<?php
session_start(); // Start the session

if (!isset($_SESSION['text'])) {
	echo "<form method='post'>"; // Changed to method='post'
	echo "<input type='text' name='text' placeholder='session'>";
	echo "<input type='submit' name='add' value='add session'>";
	echo "</form>";

} else {
	echo "<p>Session Text: " . $_SESSION['text'] . "</p>";
	echo "<form method='post'>"; // Changed to method='post'
	echo "<input type='submit' name='remove' value='remove session'>";
	echo "</form>";
}

// Handle the form submission
if (isset($_POST['add'])) {
	$_SESSION['text'] = $_POST['text'];
}

if (isset($_POST['remove'])) {
	unset($_SESSION['text']);
}
?>
</body>
</html>
