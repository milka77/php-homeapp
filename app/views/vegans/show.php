<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container w-50 ">
  <div class="col-12">
    <h1 class="text-center">Vegan Food Recipes</h1>
    <hr>
  </div>

  <!-- Vegan Dinners -->
  <div class="col-md-12 ">
    <div class="text-center">
      <h3><?php echo $data['recipe']->name; ?></h3>
    </div>

    <table class="table">
      <thead class="text-center">
        <th>Name</th>
        <th>Ingredients</th>
        <th>Details</th>
      </thead>

      <tbody>
       
          <tr>
            <td><?php echo $data['recipe']->name; ?></td>
            <td><?php echo $data['recipe']->ingredients; ?></td>
            <td class="text-center"><i class="fas fa-arrow-right"></i></td>
          </tr>
        
      </tbody>
    </table>
  </div>
  <!-- End of Vegan Dinners -->

  
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
