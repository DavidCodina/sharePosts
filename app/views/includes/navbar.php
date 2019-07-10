<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div id="navbarsExampleDefault" class="collapse navbar-collapse">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a></li>
      </ul>


      <ul class="navbar-nav ml-auto">
        <!-- If the user IS logged in, then this is displayed. -->
        <?php if( isset($_SESSION['user_id']) ) : ?>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Welcome <?php echo $_SESSION['user_name']; ?></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>

        <!-- If the user IS NOT logged in, then this is displayed. -->
        <?php else : ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div><!-- End of <div class="container"> -->
</nav>
