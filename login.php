<?php
  $user = "";
  $pass = "";
  $validated = false;

  if ($_POST)
  {
    $user = $_POST[ 'username' ];
    $pass = $_POST[ 'password' ];
  }

  session_start();
	$_SESSION[ 'login' ] = "";
  if($user!="" && $pass!="")
  {
		$conn = @mysql_connect ("localhost", "root", "root") or die ("Sorry - unable to connect to MySQL database.");
		$rs = @mysql_select_db ("admin", $conn) or die ("error");
		$sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass' ";
		$rs = mysql_query($sql,$conn);
		$result = mysql_num_rows($rs);

    if ($result > 0) $validated = true;
		if($validated)
    {
      $_SESSION[ 'login' ] = "OK";
      $_SESSION[ 'username' ] = $user;
      $_SESSION[ 'password' ] = $pass;
      header('Location: protected.php');
    }
    else
    {
      $_SESSION[ 'login' ] = "";
      echo "Invalid username or password.";
    }
  }
  else $_SESSION[ 'login' ] = "";
?>

<html>
	<head>
		<title>Login Page</title>
	</head>

	<body>
		<h1>Login Page</h1>
		<p>Please enter your username and password:</p>
		<form action="login.php" method="post">
			<table>
				<tr>
					<td align="right">Username: </td>
					<td><input size=\"20\" type="text" size="20" maxlength="15" name="username"></td>
				</tr>
        <tr>
					<td align="right">Password: </td>
					<td><input size=\"20\" type="password" size="20" maxlength="15" name="password"></td>
				</tr>
				<tr>
					<td> </td>
					<td colspan="2" align="left"><input type = "submit" value="Login"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
