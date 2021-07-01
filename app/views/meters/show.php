<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container w-50 mt-5">
  <h1 class="text-center">Meter Reading</h1>
  <hr>


  <div>
    <table class="table">
      <thead>
        <th>Reading Date</th>
        <th>Meter Type</th>
        <th>Reading Value</th>
        <th>Difference</th>
        <th>Edit</th>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $data['reading']->date; ?></td>
          <td class="text-center"><?php echo ucfirst($data['reading']->meter_type); ?></td>
          <td class="text-center"><?php echo $data['reading']->reading; ?></td>
          <td class="text-center"><?php if($data['reading']->difference == 0){
              echo "N/A";
            } else {
              echo $data['reading']->difference; 
            } ?>
          </td>
          <td class="text-center"><a href="<?php echo URLROOT; ?>/meters/update/<?php echo $data['reading']->id; ?>" class="edit-link"><i class="fas fa-edit"></i></a></td>
        </tr>
        

      </tbody>
    </table>
  </div>

  <div class="text-center">
    <a class="btn btn-outline-dark" href="<?php echo URLROOT; ?>/meters/index">Back</a>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
