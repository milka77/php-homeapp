<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container w-50 mt-5">
  <h1 class="text-center">Add New Meter Readings</h1>
  <hr>

  <!-- Form -->
  <form action="<?php echo URLROOT; ?>/meters/add" method="POST">
    <div>
      <label for="meter_type">Select Your Meter Type <span class="text-danger">*</span></label>
      <select class="form-control" name="meter_type" id="meter_type">
        <option value="readings_elect">Electricity</option>
        <option value="readings_gas">Gas</option>
      </select>
    </div>
    <div class="mt-2">
      <label class="" for="reading">Meter Reading: <span class="text-danger">*</span></label>
      <input class="form-control <?php echo (!empty($data['reading_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['reading']; ?>" type="number" name="reading" id="name" >
      <span class="invalid-feedback"><?php echo $data['reading_err']; ?></span>
    </div>
    <div class="mt-2">
      <label for="ingredients">Date of Reading: <span class="text-danger">*</span></label>
      <input class="form-control <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php if(isset($data['date'])){ echo $data['date'];} ?>" type="date" name="date">
      <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>

    </div>
    <div class="text-center pt-3 pb-3">
      <input class="btn btn-dark px-5" type="submit" value="Add" name="submit">
    </div>
  </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
