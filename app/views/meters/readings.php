<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('readings_message'); ?>
  <div class="row">
    <div class="col-12">
      <h1 class="text-center">Meter Readings</h1>
      <hr>
    </div>
    <div class="col-md-12 col-lg-6">
      <div class="text-center">
        <h3>Electicity</h3>
        <small class="text-muted">Old meter SN: A03M141173</small><br>
        <small>Smart meter SN: 21E5002656</small>
      </div>
      <table class="table">
        <thead>
          <th>Reading Date</th>
          <th>Reading Value</th>
          <th>Difference</th>
          <th>Details</th>
        </thead>
        <tbody>
          
          <?php foreach($data['electricity'] as $elec) { ?>
            <tr>
              <td><?php echo $elec->date; ?></td>
              <td class="text-center"><?php echo $elec->reading; ?></td>
              <td class="text-center"><?php if($elec->difference == 0){
                  echo "N/A";
                } else {
                  echo $elec->difference; 
                } ?>
              </td>
              <td class="text-center"><a href="<?php echo URLROOT; ?>/meters/show/<?php echo $elec->id; ?>" class="edit-link"><i class="fas fa-arrow-right"></i></a></td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>


    <div class="col-md-12 col-lg-6">
      <div class="text-center">
        <h3>Gas</h3>
        <small class="text-muted">Old Meter SN: 048481</small><br>
        <small>Smart Meter SN: E6E02553062021</small>
      </div>
      <table class="table">
        <thead>
          <th>Reading Date</th>
          <th>Reading Value</th>
          <th>Difference</th>
          <th>Details</th>
        </thead>
        <tbody>
          
          <?php foreach($data['gases'] as $gas) { ?>
            <tr>
              <td><?php echo $gas->date; ?></td>
              <td class="text-center"><?php echo $gas->reading; ?></td>
              <td class="text-center"><?php if($gas->difference == 0){
                  echo "N/A";
                } else {
                  echo $gas->difference; 
                } ?>
              </td>
              <td class="text-center"><a href="<?php echo URLROOT; ?>/meters/show/<?php echo $gas->id; ?>" class="edit-link"><i class="fas fa-arrow-right"></i></a></td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col text-center">
      <a href="<?php echo URLROOT; ?>/meters/add" class="btn btn-outline-dark">Add new reading</a>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>