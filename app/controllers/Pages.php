<?php

class Pages extends Controller {
  public function __construct(){
    $this->newsModel = $this->model('News');
    $this->userModel = $this->model('User');
  }

  public function index(){
    // Get all the news from the DB
    $news = $this->newsModel->getNews();

    $data = [
      'title' => 'Milka Home App',
      'news' => $news,
    ];

    $this->view('pages/index', $data);
  }

  public function about(){
    $data = [
      'title' => 'About Us'
    ];
    
    $this->view('pages/about', $data);
  }
}