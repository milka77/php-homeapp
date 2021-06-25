<?php
// Simple page redirection
function redirect($page){
  header('location: ' . URLROOT . '/' . $page);
}