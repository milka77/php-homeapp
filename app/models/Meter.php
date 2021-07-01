<?php
  class Meter {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    // Get Electricity readings
    public function getElecReadings() {
      $this->db->query('SELECT * FROM readings WHERE meter_type = "electricity" ORDER BY id DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    // Get Gas readings
    public function getGasReadings() {
      $this->db->query('SELECT * FROM readings WHERE meter_type = "gas" ORDER BY id DESC');

      $results = $this->db->resultSet();

      return $results;
    }


    public function getLastElecReading() {
      $this->db->query('SELECT reading FROM readings WHERE meter_type = "electricity" ORDER BY id DESC LIMIT 1');

      $results = $this->db->single();

      return $results;
    }


    public function getLastGasReading() {
      $this->db->query('SELECT reading FROM readings WHERE meter_type = "gas" ORDER BY id DESC LIMIT 1');

      $results = $this->db->single();

      return $results;
    }

    public function addReading($data) {
      // Query
      $this->db->query('INSERT INTO readings (meter_type, reading, date, difference) VALUES(:meter_type, :reading, :date, :difference)');

      // Bind values
      $this->db->bind(':meter_type', $data['meter_type']);
      $this->db->bind(':reading', $data['reading']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':difference', $data['difference']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }


    public function getReadingById($id) {
      // Query
      $this->db->query('SELECT * FROM readings WHERE id = :id');

      // Bind value
      $this->db->bind(':id', $id);

      // Execute
      $row = $this->db->single();

      return $row;
    }

    public function updateReading($data) {
      // Query
      $this->db->query('UPDATE readings SET reading = :reading, date = :date, difference = :difference WHERE id = :id');

      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':reading', $data['reading']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':difference', $data['difference']);


      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    // Delete function
    public function deleteReading($id) {
      // Query
      $this->db->query('DELETE FROM readings WHERE id = :id');

      // Bind value
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }