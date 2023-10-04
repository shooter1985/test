<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Title Page</title>

      <!-- Bootstrap CSS -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

   </head>
   <body>
      <h1 class="text-center">Liste des Users</h1>

      <?php

include("connection.php");

$persons = $pdo->query("SELECT * FROM user");

?>

   <table class="table">
    <tr>
        <th>Nom</th>
        <th>CA</th>
        <th>Classement</th>
   </tr>
   <?php
        foreach ($persons->fetchAll(PDO::FETCH_ASSOC) as $person)
        { 
         ?>
         <tr>
            <td> <?php echo $person['nom'] ?></td>
            <td> <?php echo $person['ca'] ?></td>
            <td> <?php echo $person['classement'] ?></td>
         </tr>
        <?php
        }
        ?>
    </tr>
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </body>
</html>
