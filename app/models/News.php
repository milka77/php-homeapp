<?php
  class News {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    // Add News to DB
    public function addNews($data) {
      // Query
      $this->db->query('INSERT INTO news (title, body, added_by) VALUES(:title, :body, :added_by');

      // Bind Values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':added_by', $SESSION['user_first_name']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    // Get the News list
    public function getNews() {
      //Query
      $this->db->query('SELECT * FROM news ORDER BY date DESC');

      $results = $this->db->resultSet();

      return $results;
    }
  }