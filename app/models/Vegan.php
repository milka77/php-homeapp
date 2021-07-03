<?php 
  class Vegan {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    // Add Recipies
    public function addRecipe($data) {
      // Query
      $this->db->query('INSERT INTO vegan (id, type, name, ingredients) VALUES(NULL, :type, :name, :ingredients)');

      // Bind values
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':ingredients', $data['ingredients']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    // Get dinners
    public function getDinners() {
      $this->db->query('SELECT * FROM vegan WHERE type = "dinner" ORDER BY id DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    // Get soups
    public function getSoups() {
      $this->db->query('SELECT * FROM vegan WHERE type = "soup" ORDER BY id DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function getRecipeByID($id) {
      // Query
      $this->db->query('SELECT * FROM vegan where id = :id');

      // Bind value
      $this->db->bind(':id', $id);

      $result = $this->db->single();

      return $result;
    }
  }