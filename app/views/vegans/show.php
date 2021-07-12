<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container w-75 ">
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
            <!-- <td><?php // echo $data['recipe']->ingredients; ?></td> -->
            <td>
              <form action="<?php echo URLROOT;?>/shopping_lists/add" method="POST">
              <?php
                $filtered = str_replace(", ", ",", $data['recipe']->ingredients);
                $ingredients = preg_split("/[,]+/", $filtered);
                foreach($ingredients as $ingredient) {
                  echo '<input class="mr-1" type="checkbox" name="item_name[]" value="' . $ingredient . '">' . $ingredient . '<br>';
                }
              ?>
                
            </td>
            <td class="text-center"><input class="btn btn-outline-dark" type="submit" value="Add item(s)"></td>
            
              </form>
          </tr>
        
      </tbody>
    </table>
  </div>
  <!-- End of Vegan Dinners -->

  
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
