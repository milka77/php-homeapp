<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/meters/index">Readings</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Vegan</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo URLROOT; ?>/vegans/index">Vegan Recipes</a>
          <a class="dropdown-item" href="<?php echo URLROOT; ?>/vegans/add">Add New Recipe</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo URLROOT; ?>/shopping_lists/index">Shopping List</a>
        </div>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Fitness</a>
        </li>
      </ul>
      
      <!-- Login Menu -->
      <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['user_id'])) : ?>
          <li class="nav-item text-white">
            <a class="nav-link" href="#">Welcome <?php echo $_SESSION['user_first_name']; ?></a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout </a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>