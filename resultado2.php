<html>
 <head>
 	<title>Exemple de lectura de dades a MySQL</title>
 	<meta charset="utf-8">
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
 	<h1>listado de ciudades</h1> 
 	<?php

 		$conn = mysqli_connect('localhost','root','admin'); 		
 		mysqli_select_db($conn, 'world'); 		
 		 		
 		$consulta = "SELECT * FROM city WHERE '".$_POST["codigo"]."' = CountryCode;";  		
 		$resultat = mysqli_query($conn, $consulta); 
 		
 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 		echo"<table>";
 		while( $registre = mysqli_fetch_assoc($resultat) )
	 		{ 
	 			echo "\t<tr>\n"; 
		 			echo "\t\t<td>".$registre["Name"]."</td>\n";	 					 			
	 			echo "\t</tr>\n";
	 		} 
	 	echo"</table>";
	?> 	
 </body>
