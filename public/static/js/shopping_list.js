let list = document.getElementById('shoppingList');

function itemDone(id) {
  
  let listItem = document.getElementById(id);
  listItem.innerHTML += ' <i class="fas fa-check green pl-2"></i>';
  listItem.classList.add("item-done");
  listItem.classList.add("text-muted");
}

