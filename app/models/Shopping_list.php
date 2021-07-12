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

    // Get the shopping list
    public function getList() {
      // Query
      $this->db->query('SELECT * FROM shopping_list ORDER BY item_name');

      $results = $this->db->resultSet();

      return $results;
    }

    // Get single item
    public function getItem($item) {
      // Query
      $this->db->query('SELECT * FROM shopping_list WHERE item_name = :item_name');

      // Bind items
      $this->db->bind(':item_name', $item);

      $result = $this->db->single();

      return $result;
    }

    // Clear Shopping List
    public function clearList() {
      // Query
      $this->db->query('TRUNCATE TABLE shopping_list');

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }