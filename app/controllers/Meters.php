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

    public function add() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Set difference 
        $meter_type = $_POST['meter_type'];
        // Get the last reading
        if($meter_type === 'readings_elect') {
          $lastReading = $this->meterModel->getLastElecReading();
          $lastReading = (int)$lastReading->reading;

        } else {
          $lastReading = $this->meterModel->getLastGasReading();
          $lastReading = (int)$lastReading->reading;

        }
        $currReading = trim($_POST['reading']);

        // Calculate the difference
        $diff = (int)$currReading - $lastReading; 

        // Values
        $data = [
          'meter_type' => $meter_type,
          'reading' => trim($_POST['reading']),
          'date' => $_POST['date'],
          'difference' => $diff,
          'reading_err' => '',
          'date_err' => '',
        ];

        
        // Validate data
        if($currReading <= $lastReading) {
          $data['reading_err'] = 'Please check your reading! New reading can\'t less or the same as the previous reading!';
        }

        if(empty($data['reading'])) {
          $data['reading_err'] = 'Please enter your reading';
        }

        if(date('Y-m-j') < $data['date']) {
          $data['date_err'] = 'Readings date can\'t be in the future!';
        }
        
        if(empty($data['date'])) {
          $data['date_err'] = 'Please enter a date';
        }


        

        // Make sure no errors left
        if(empty($data['reading_err'])) {
          // Validated
          if($this->meterModel->addReading($data)) {
            flash('reading_message', 'Reading added successfuly');
            redirect('meters/add');

          } else {
            die('Something went wrong');
          }

        } else {
          // Load the view with errors
          $this->view('meters/add', $data);
        }

      } else {
        // Not a POST request
        $data = [
          'reading' => '',
        ];

        $this->view('meters/add', $data);
      }
    }
  }