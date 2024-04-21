<?php
	//Session duhet te shenohet ne fillim te file php.
	session_start();
?>
<html>
	<head>
	</head>
	<body>

		<?php
			$_SESSION['emri']='Fatjona';
			$_SESSION['mbiemri']='Hoxhaj';
			echo 'Session set';
			echo '<br>';
			print_r($_SESSION); //Na mundeson nxjerrjen e te gjitha sessioneve qe gjenden tek variabla globale $_SESSION. Ruhen ne website
		?>
		<?php 	
			if (!isset($_SESSION['count'])) 
			{
				$_SESSION['count'] = 1;
			} 
			else 
			{
				$_SESSION['count']++;
			} 
				echo $_SESSION['count']; ?>  
		<?php
			//I fshin te gjitha variablat e session.
		session_unset(); 
			//E fshin kete session. Tek logout
			//session_destroy();
		?>
		<a href='Sessions1.php'>next</a>
</body>
</html>