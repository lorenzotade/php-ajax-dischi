<?php
  require_once __DIR__ . '/data/db.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style/style.css">
  <title>php-ajax-dischi</title>
</head>
<body>
  <header>
    <img src="assets/img/logo.png" alt="Spotify logo">
  </header>

  <main>
    <div class="record-container">
      <?php foreach ($database as $record) { ?>
        <div class="record">
          <div class="record-details">
            <img src="<?php echo $record['poster'] ?>" alt="<?php echo $record['title'] ?>">
            <h2><?php echo $record['title'] ?></h2>
            <p><?php echo $record['author'] ?></p>
            <p class="year"><?php echo $record['year'] ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>
  
</body>
</html>