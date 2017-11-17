<html>
 <head>
  <title>Exemple de lectura de dades a MySQL</title>
  <style>
     table,td {
      border: 1px solid black;
      border-spacing: 0px;
    }
  </style>
 </head>
 
 <body>
  <h1>Menu listado Continentes</h1>  
    <?php
       try {
        $hostname = "localhost";
        $dbname = "world";
        $username = "root";
        $pw = "admin";
        $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
      } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
      }

      //preparem i executem la consulta
      $query = $pdo->prepare("select distinct Continent FROM country");
      $query->execute();

      //anem agafant les fileres d'amb una amb una
      ?>
      <form method="POST" action="resultado1_PDO.php">
      <select name="continente">
        <?php
            $row = $query->fetch();
            while ( $row ) {
              echo "\t\t<option>".$row['Continent']."</option>\n";
              $row = $query->fetch();
            }
        ?>
      <input type="submit" value="consulta países"/>
      </select> 
      <?php
          //eliminem els objectes per alliberar memòria 
          unset($pdo); 
          unset($query)
      ?>
</body>
</html>