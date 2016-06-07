<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form','file','admaresi'));
        $this->load->database();
        $this->load->library(array('session','upload'));
        $this->load->model(array('admaresites'));
    }
}
