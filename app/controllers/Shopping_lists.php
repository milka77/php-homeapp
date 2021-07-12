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
      // Get the list from DB
      $list = $this->shopping_listModel->getList();

      $data = [
        'list' => $list,
      ];

      $this->view('shopping_lists/list', $data);
    }

    public function add() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'item_err' => '',
        ];

        if(!empty($_POST['item_name'])) {
          foreach($_POST['item_name'] as $item) {
            
            if($this->shopping_listModel->getItem($item)) {
              flash_danger('list_error', 'Item or some of the items are already on your shopping list');

              redirect('shopping_lists/index', $data);
              // $this->view('shopping_lists/index', $data);
            } else {
              $data['item_name'] = $item;
              if($this->shopping_listModel->addItem($data)) {
                flash('list_message', 'Item added to the shopping list');
                redirect('shopping_lists/index');
              }

            }
          }

        } else {
          // Load the view with errors
          //$this->view('vegans/index', $data);
          echo 'Error';
        }

      } else {
        // Not a POST request
        $data = [
          'item_name' => '',
        ];

        $this->view('vegans/index', $data);
      }
    }

    public function clearList() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $this->shopping_listModel->clearList();

        redirect('shopping_lists/index');
      }
    }

  }