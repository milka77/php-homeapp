<?php
  class Newss extends Controller {

    public function __construct() {
      $this->newsModel = $this->model('News');
      $this->userModel = $this->model('User');
    }

    
  }