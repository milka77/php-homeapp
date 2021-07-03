<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container w-50 mt-5">
  <h1 class="text-center">Add New Vegan Recipe</h1>
  <hr>

  <!-- Form -->
  <form action="<?php echo URLROOT; ?>/vegans/add" method="POST">
    <!-- Type selection -->
    <div class="form-group">
      <label for="type">Select Your Recipe Type <span class="text-danger">*</span></label>
      <select class="form-control" name="type" id="type">
        <option value="dinner">Dinner</option>
        <option value="soup">Soup</option>
      </select>
    </div>

    <!-- Name -->
    <div class="form-group">
      <label for="name">Name <span class="text-danger">*</span></label>
      <input class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>" type="text" name="name" id="name">
      <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
    </div>

    <!-- Ingredients -->
    <div class="form-group">
      <label for="ingredients">Ingredients <span class="text-danger">*</span></label>
      <small id="ingredientsHelp" class="form-text text-muted">Please seperate the ingredients with a coma (,).</small>
      <textarea class="form-control <?php echo (!empty($data['ingredients_err'])) ? 'is-invalid' : ''; ?>" name="ingredients" rows="5" aria-describedby="ingredientsHelp"></textarea>
      <span class="invalid-feedback"><?php echo $data['ingredients_err']; ?></span>
    </div>

    <!-- Submit -->
    <div class="text-center pt-3 pb-3">
      <input class="btn btn-outline-dark" type="submit" value="Add Recipe" name="submit">
    </div>

  </form>
  <!-- End of Form -->
<?php print_r($data); ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>