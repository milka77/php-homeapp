<?php
  class Shopping_list {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    // Add item to shopping list
    public function addItem($data) {
      // Query
      $this->db->query('INSERT INTO shopping_list (item_name) VALUES (:item_name)');

      // Bind Value
      $this->db->bind(':item_name', $data['item_name']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }