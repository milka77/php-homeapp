<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container w-50 mt-5">
  <h1 class="text-center">Update Meter Readings</h1>
  <hr>

  <!-- Form -->
  <form action="<?php echo URLROOT; ?>/meters/update/<?php if(isset($data['reading']->id)){ echo $data['reading']->id; } ?>" method="POST">
    <div>
      <label for="meter_type">Select Your Meter Type <span class="text-danger">*</span></label>
      <select class="form-control" name="meter_type" id="meter_type">
        <option value="readings_elect">Electricity</option>
        <option value="readings_gas" <?php if($data['reading']->meter_type == 'gas'){ echo 'selected'; } ?>>Gas</option>
      </select>
    </div>

    <div class="mt-2">
      <label class="" for="reading">Meter Reading: <span class="text-danger">*</span></label>
      <input type="number" name="reading" id="reading" class=" form-control <?php echo (!empty($data['reading_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['reading']->reading; ?>">
      <span class="invalid-feedback"><?php echo $data['reading_err']; ?></span>
    </div>

    <div class="mt-2">
      <label for="ingredients">Date of Reading: <span class="text-danger">*</span></label>
      <input class="form-control <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php if(isset($data['reading']->date)){ echo $data['reading']->date;} ?>" type="date" name="date">
      <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
    </div>
    
    <div class="mt-2">
      <label for="difference">Difference: <small class="text-muted">Auto calculated.</small></label>
      <input class="form-control <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['reading']->difference; ?>" type="number" name="difference" id="difference">
      <span class="invalid-feedback" id="diff-feedback"></span>

    </div>
    <div class="text-center pt-3 pb-3">
      <input class="btn btn-dark px-5" type="submit" value="Update" name="submit">
    </div>
  </form>
</div>

<script src="<?php echo URLROOT; ?>/public/static/js/update.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>