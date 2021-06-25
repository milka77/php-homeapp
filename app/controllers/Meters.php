<?php
  class Meters extends Controller {

    public function __construct() {

      // Check if the user is logged in if not redirect to login
      if(!isLoggedIn()) {
        redirect('users/login');
      }

      $this->meterModel = $this->model('Meter');
      $this->userModel = $this->model('User');
    }

    public function readings() {
      // Get electricity and gas readings
      $electicity = $this->meterModel->getElecReadings();
      $gases = $this->meterModel->getGasReadings();

      $data = [
        'electricity' => $electicity,
        'gases' => $gases,
      ];

      $this->view('meters/readings', $data);
      
    }

    
  }