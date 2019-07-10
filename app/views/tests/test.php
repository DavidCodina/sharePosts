<?php require APPROOT .  '/views/includes/header.php'; ?>


<?php echo "<header>" . "<h1>" . $data['title'] . "</h1>" . "</header>"; ?>

<?php echo "<main>" ?>
  <ul>
    <?php foreach($data['tests'] as $test) : ?>
      <li><?php echo $test->title ?></li>

    <?php endforeach; ?>
  </ul>
<?php echo "</main>" ?>


<?php require APPROOT .  '/views/includes/footer.php'; ?>
