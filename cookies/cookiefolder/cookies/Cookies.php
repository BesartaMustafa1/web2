<?php
	$cookie_name = "User";
	$cookie_value = "Era Sheqiri";
	//setcookie(name, value, expire, path, domain, secure, httponly);
	//setcookie($cookie_name, $cookie_value, time() + 5, "/"); // 86400 = 1 dite
	// Ne kete menyre mund te e fshijme nje cookie.
	//setcookie("User", "", time() - 10);
?>
<html>
	<head>
	</head>
	<body>

		<?php
			if(!isset($_COOKIE[$cookie_name]))
				{
					echo "Terms And Agreements  " . $cookie_name . " © is  set! ";
				} 
				else 
				{
				echo "Cookie " . $cookie_name . " is set!<br>";
				echo "Value is: " . $_COOKIE[$cookie_name];
				}
		?>
</body>
</html>