<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-3"><?php echo $data['title']; ?></h1>
      <p class="lead">Simple Home App built with PHP milkaMVC Framework</p>
    </div>
  </div>
  <!-- News list -->
  <h2 class="text-center">NEWS</h2>


  <?php 
    foreach($data['news'] as $news) { ?>
      <hr class="mx-auto my-4 w-75">
      <div class="mx-auto news w-75">
        <h4 class="text-center mb-3"><?php echo $news->title; ?></h4>
        <p class="mb-3"><?php echo $news->body; ?> </p>
        <small class="small">Added by: <strong><?php echo $news->added_by; ?></strong> at: <strong><?php echo $news->date; ?></strong></small>
      </div>
      
  <?php } ?>

  <!-- End of News list -->
<?php require APPROOT . '/views/inc/footer.php'; ?>