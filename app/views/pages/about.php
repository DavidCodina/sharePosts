<?php require APPROOT .  '/views/includes/header.php'; ?>


<header>
  <h1><?php echo $data['title']; ?></h1>

  <p><?php echo $data['description']; ?> Version: <strong><?php echo APPVERSION; ?>.</strong></p>
</header>


<?php require APPROOT .  '/views/includes/footer.php'; ?>
