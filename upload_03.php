<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Generic - Alpha by HTML5 UP</title>
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
						<h2>Your upload information</h2>
					</header>
					<div class="box">

<?php
if (($_FILES["file"]["type"] == "image/png")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/gif") &&
    $_FILES["file"]["size"] < 500000)
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
        if (file_exists("images/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "images/" . $_FILES["file"]["name"]);
            echo "Saved as: " . "images/" . $_FILES["file"]["name"];
        }
    }
}
else
{
    if ($_FILES["file"]["type"] != "image/png")
        echo "File is not of the permitted type.";
    else if ($_FILES["file"]["size"] < 65536)
        echo "File exceeds permitted size.";
}
?>
					</div>
				</section>
