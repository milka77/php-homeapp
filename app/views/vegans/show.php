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
<?php echo $data['recipe']->ingredients; ?>
      <tbody>
       
          <tr>
            <td><?php echo $data['recipe']->name; ?></td>
            <!-- <td><?php // echo $data['recipe']->ingredients; ?></td> -->
            <td>
              <form action="" method="POST">
              <?php
                $filtered = str_replace(", ", ",", $data['recipe']->ingredients);
                $ingredients = preg_split("/[,]+/", $filtered);
                foreach($ingredients as $ingredient) {
                  echo '<input class="mr-1" type="checkbox" name="' . $ingredient . '" id="">' . $ingredient . '<br>';
                }
              ?>
                
                </td>
                <td class="text-center"><input type="submit" value="submit"></td>
            
              </form>
          </tr>
        
      </tbody>
    </table>
  </div>
  <!-- End of Vegan Dinners -->

  
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
