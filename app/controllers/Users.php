<?php
class Users extends Controller {
  public function __construct() {
    $this->userModel = $this->model('User');
  }

  public function register(){
    // Check for POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process Form
      
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data 
      $data = [
        'first_name' => trim($_POST['first_name']),
        'last_name' => trim($_POST['last_name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'first_name_err' => '',
        'last_name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
      ];

      // Validate Email
      if(empty($data['email'])){
        $data['email_err'] = 'Please enter email';
      } else {
        // Check email
        if($this->userModel->findUserByEmail($data['email'])){
          $data['email_err'] = 'Email is already registered';
        }
      }

      // Validate First Name
      if(empty($data['first_name'])){
        $data['first_name_err'] = 'Please enter your first name';
      }

      // Validate Last Name
      if(empty($data['last_name'])){
        $data['last_name_err'] = 'Please enter your last name';
      }
      
      // Validate Password
      if(empty($data['password'])){
        $data['password_err'] = 'Please enter password';
      } elseif(strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Confirm Password
      if(empty($data['confirm_password'])){
        $data['confirm_password_err'] = 'Please confirm password';
      } else {
        if($data['confirm_password'] != $data['password']){
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }

      // Make sure errors are empty
      if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
        // Validated
        
        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
        if($this->userModel->register($data)){
          flash('register_success', 'You are registered and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
        
      } else {
        // Load view with erros
        $this->view('users/register', $data);
      }

    } else {
      // Init data 
      $data = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'first_name_err' => '',
        'last_name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }

  public function login(){
    // Check for POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process Form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data 
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      // Validate Email
      if(empty($data['email'])){
        $data['email_err'] = 'Please enter email';
      }

      // Validate Password
      if(empty($data['password'])){
        $data['password_err'] = 'Please enter password';
      }

      // Check for user/email
      if($this->userModel->findUserByEmail($data['email'])){
        // User found
      } else {
        $data['email_err'] = 'No user found';
      }

      // Make sure errors are empty
      if(empty($data['email_err']) && empty($data['password_err'])){
        // Validated
        // Check abd set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if($loggedInUser){
          // Create Session
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorrect';

          $this->view('users/login', $data);
        }
      } else {
        // Load view with erros
        $this->view('users/login', $data);
      }

      
    } else {
      // Init data 
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }
  
  public function createUserSession($user){
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_first_name'] = $user->first_name;
    $_SESSION['user_last_name'] = $user->last_name;
    redirect('posts');
  }

  public function logout(){
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_first_name']);
    unset($_SESSION['user_last_name']);
    session_destroy();
    redirect('users/login');
  }
}