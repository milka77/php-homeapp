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
  }