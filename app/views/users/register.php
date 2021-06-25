<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Create An Account</h2>
      <p>Please fill out this form to register with us</p>
      <!-- Register Form -->
      <form action="<?php echo URLROOT; ?>/users/register" method="POST">
        <!-- First Name -->
        <div class="form-group">
          <label for="name">First name: <sup>*</sup></label>
          <input type="text" name="first_name" class="form-control form-control-lg <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['first_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['first_name_err']; ?></span>
        </div>
        <!-- End of First Name -->

        <!-- Last Name -->
        <div class="form-group">
          <label for="name">Last name: <sup>*</sup></label>
          <input type="text" name="last_name" class="form-control form-control-lg <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['last_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['last_name_err']; ?></span>
        </div>
        <!-- End of Last Name -->

        <!-- Email -->
        <div class="form-group">
          <label for="email">Email: <sup>*</sup></label>
          <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <!-- End of Email -->

        <!-- Password -->
        <div class="form-group">
          <label for="password">Password: <sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <!-- End of Password -->

        <!-- Confirm_password -->
        <div class="form-group">
          <label for="confirm_password">Confirm Password: <sup>*</sup></label>
          <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>
        <!-- End of Confirm_password -->

        <div class="row">
          <div class="col">
            <input type="submit" value="Register" class="btn btn-success btn-block">
          </div>

          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
          </div>
        </div>

      </form>
      <!-- End of Register Form -->
    </div>
  </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>