<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Login extends MY_Controller
{

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['title']    = "Login";
    $data['sec']      = "webpage";
    $data['file']     = "login";
    $this->admaresites->getPage($data);
  }

  public function check() {
    $username = trim(htmlentities($this->input->post('username', TRUE), ENT_QUOTES, 'utf-8'));
    $password = md5(trim(htmlentities($this->input->post('password', TRUE), ENT_QUOTES, 'utf-8')));
    $this->admaresites->getLogin($username, $password);
  }
}
