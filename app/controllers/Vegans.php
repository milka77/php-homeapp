<?php
  class Vegans extends Controller {

    public function __construct() {
      // Check if the user is logged in if not redirect to login
      if(!isLoggedIn()) {
        redirect('users/login');
      }

      $this->veganModel = $this->model('Vegan');
      $this->userModel = $this->model('User');
    }

    public function index() {
      // Get recipies from the DB
      $dinners = $this->veganModel->getDinners();
      $soups = $this->veganModel->getSoups();

      $data = [
        'dinners' => $dinners,
        'soups' => $soups,
      ];

      $this->view('vegans/index', $data);
    }

    public function add() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Values
        $data = [
          'type' => $_POST['type'],
          'name' => trim($_POST['name']),
          'ingredients' => trim($_POST['ingredients']),
          'name_err' => '', 
          'ingredients_err' => '', 
        ];

        // Validate data
        if(empty($data['name'])) {
          $data['name_err'] = 'Please enter name';
        }

        if(empty($data['ingredients'])) {
          $data['ingredients_err'] = "Please enter ingredients";
        }

        // No errors left and execute
        if(empty($data['name_err']) && empty($data['ingredients_err'])) {
          // validated
          if($this->veganModel->addRecipe($data)) {
            flash('recipe_message', 'Recipe added successfully');
            redirect('vegans/index');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load the view with errors
          $this->view('vegans/add', $data);
        }

      } else {
        // Not a POST request
        $data = [
          'name' => '',
          'ingredients' => '',
        ];

        $this->view('vegans/add', $data);
      }
    }

    public function show($id) {
      $recipe = $this->veganModel->getRecipeById($id);

      $data = [
        'recipe' => $recipe
      ];

      $this->view('vegans/show', $data);
    }
  }