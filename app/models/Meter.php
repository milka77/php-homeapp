<?php
  class Meter {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    // Get Electricity readings
    public function getElecReadings() {
      $this->db->query('SELECT * FROM readings_elect ORDER BY id DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    // Get Gas readings
    public function getGasReadings() {
      $this->db->query('SELECT * FROM readings_gas ORDER BY id DESC');

      $results = $this->db->resultSet();

      return $results;
    }


    public function getLastElecReading() {
      $this->db->query('SELECT reading FROM readings_elect ORDER BY id DESC LIMIT 1');

      $results = $this->db->single();

      return $results;
    }


    public function getLastGasReading() {
      $this->db->query('SELECT * FROM readings_gas ORDER BY id DESC LIMIT 1');

      $results = $this->db->single();

      return $results;
    }

    public function addReading($data) {
      // Query
      $this->db->query('INSERT INTO ' . $data['meter_type'] . ' (reading, date, difference) VALUES(:reading, :date, :difference)');

      // Bind values
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
  }