<?php
  class Shopping_lists extends Controller {

    public function __construct() {
      // Check if the user is logged in or redirect
      if(!isLoggedIn()) {
        redirect('users/login');
      }

      $this->shopping_listModel = $this->model('Shopping_list');
      $this->userModel = $this->model('User');
    }

    public function index() {


      $this->view('shopping_lists/list');
    }
  }