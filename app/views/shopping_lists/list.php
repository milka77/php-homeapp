<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('list_message'); ?>
<?php flash_danger('list_error'); ?>
<div class="container w-50">
  <h1 class="text-center">Shopping List</h1>
  <hr>

  <div >
    <h4 class="text-center">Items Needed</h4>
    <ul id="shoppingList"> 
      <?php $listId = 1; ?>
      <?php foreach($data['list'] as $list) { ?>
        <li id="listitem-<?php echo $listId; ?>" onclick="itemDone(this.id)">
           <?php echo $list->item_name; ?></li>
        <?php $listId ++; ?>
      <?php } ?>

    </ul>
    <hr>
    <form class="text-center" action="<?php echo URLROOT; ?>/shopping_lists/clearList" method="POST">
      <a href="<?php echo URLROOT; ?>/vegans/index" class="btn btn-outline-dark">Back To Recipes</a>
      <input class="btn btn-outline-danger" type="submit" value="Clear All Items" name="submit">
    </form>
  </div>
  

</div>

<script src="<?php echo URLROOT; ?>/public/static/js/shopping_list.js"></script>


<?php require APPROOT . '/views/inc/footer.php'; ?>