<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class C_404 extends CI_Controller
{
 
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'Recaptcha'));
        $this->load->model('m_login');
    }
 
    public function index()
    {   
       
 
        $this->load->view('v_404');
        
    }
 
   
 
}	
