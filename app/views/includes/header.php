<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> <?php echo SITENAME;?> </title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Rather than going to fontawesome.com, this was gotten from:
  https://www.bootstrapcdn.com/fontawesome/
  fontawesome.com has set it up now so you need to register with an account. -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Notice how in the href value below we are not actually doing: /public/css/style.css
  This is because of how we set up the .htaccess files: -->
  <link href="<?php echo URLROOT;?>/css/style.css" rel="stylesheet"/>
</head>
<body>
  <?php require APPROOT . '/views/includes/navbar.php' ?>
  <div class="container">
