<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Get the short URL from the request URL
$short_url = ltrim($_SERVER['REQUEST_URI'], '/');

// Sanitize the short URL
$short_url = preg_replace("/[^a-zA-Z0-9]+/", "", $short_url);

// Look up the short URL in the database to get the corresponding long URL
$sql = "SELECT long_url FROM url_mapping WHERE short_url = '$short_url'";
$result = mysqli_query($con, $sql);

if ($result->num_rows === 1) {
    // If a matching long URL is found, redirect the user to the corresponding long URL
    $row = $result->fetch_assoc();
    $long_url = $row['long_url'];
    header("Location: $long_url");
    exit;
} else {
    // If the short URL is not found in the database, you can handle the error here
    // For example, redirect to a 404 page or the homepage.
    header("Location: ../html/404.html");
    exit;
}

$con->close();
?>