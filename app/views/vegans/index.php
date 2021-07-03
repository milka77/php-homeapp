<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('recipe_message'); ?>

<div class="row">
  <div class="col-12">
    <h1 class="text-center">Vegan Food Recipes</h1>
    <hr>
  </div>

  <!-- Vegan Dinners -->
  <div class="col-md-12 col-lg-6">
    <div class="text-center">
      <h3>Vegan Dinners</h3>
    </div>

    <table class="table">
      <thead>
        <th>Name</th>
        <th>Ingredients</th>
        <th>Details</th>
      </thead>

      <tbody>
        <?php foreach($data['dinners'] as $dinner) { ?>
          <tr>
            <td><?php echo $dinner->name; ?></td>
            <td><?php echo $dinner->ingredients; ?></td>
            <td class="text-center"><i class="fas fa-arrow-right"></i></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- End of Vegan Dinners -->

  <!-- Vegan Soups -->
  <div class="col-md-12 col-lg-6">
    <div class="text-center">
      <h3>Vegan Dinners</h3>
    </div>

    <table class="table">
      <thead>
        <th>Name</th>
        <th>Ingredients</th>
        <th>Details</th>
      </thead>

      <tbody>
        <?php foreach($data['soups'] as $soup) { ?>
          <tr>
            <td><?php echo $soup->name; ?></td>
            <td><?php echo $soup->ingredients; ?></td>
            <td class="text-center"><i class="fas fa-arrow-right"></i></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- End of Vegan Soups -->

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>