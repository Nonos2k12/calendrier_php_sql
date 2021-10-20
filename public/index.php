<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

   <title>Mon calendrier</title>
</head>
<body>
   
   <nav class="navbar navbar-dark bg-primary mb-3">
      <a href="/index.php" class="navbar-brand">Mon calendrier</a>
   </nav>

   <?php 
   require '../src/Date/Month.php';
   $month = new App\Date\Month(1, 2018); 
   ?>

   <h1><?= $month->toString(); ?></h1>

   <?php $month->getWeeks(); ?>

</body>
</html>