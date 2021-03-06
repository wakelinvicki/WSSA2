<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Guestbook</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Web Server Scripting</a> by Vicki Wakelin</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Criteria</a>
								<ul>
									<li><a href="screen.html">System Checker - P2</a></li>
									<li><a href="upload.html">File Uploader - P3</a></li>
									<li><a href="login.php">Simple Login - P4</a></li>
                                    <li><a href="#">Guest Book - P5</a></li>
									<!--<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>-->
								</ul>
							</li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>

    <section id="main" class="container">
					<header>
	           <h1>Guest Book</h1>
					</header>
					<div class="box">

    <p>Click <a href="guestbook.html">here</a> to return to Guestbook.</p>

    <h3>Messages:</h3>

  <?php

// connect to MySQL
$conn = @mysql_connect ("198.91.81.8" , "wakelinv_gbook" , "gbookpassword")
or die ("Sorry - unable to connect to MySQL database " );

// select the database
$rs = @mysql_select_db ( "wakelinv_gbook" , $conn ) or die ( "error" );

//Create the query
$sql = "SELECT * FROM message";

// execute the query
$rs = mysql_query( $sql, $conn );

// display the results
echo ( "<table border='1' ><tr><td><b>Name</b></td><td><b>Message</b></td></tr>" );

while ($row = mysql_fetch_array( $rs ) )
{
  echo ( "<tr><td>".$row["guestName"]. "</td><td>".$row["msg"]."</td></tr>" );
}
echo ( "</table>" );
?>

  </body>
</html>
