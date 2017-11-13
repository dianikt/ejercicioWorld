<html>
 <head>
 	<title>Exemple de lectura de dades a MySQL</title>
 	<style>
 		body{
 		}
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 	</style>
 </head>
 
 <body>
 	<h1>Menu listado países</h1> 
 	<?php
 		$conn = mysqli_connect('localhost','root','admin'); 		
 		mysqli_select_db($conn, 'world'); 		
 		
 		$consulta = "SELECT Name FROM country;";  		
 		$resultat = mysqli_query($conn, $consulta); 
 		
 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 	?> 	
 	<select>		
 	<?php
 		while( $registre = mysqli_fetch_assoc($resultat) )
 		{ 

 			echo "\t\t<option>".$registre["Name"]."</option>\n";		
 		} 		
 	?>
 	</select>  
 </body>
</html>