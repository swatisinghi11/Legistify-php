<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {
public function index()
	{
		$this->load->view('landing_page');
		// $this->load->view('signin');
	}
public function signin()
	{
		$this->load->view('signin');
	}
public function signup()
	{
		$this->load->view('signup');
	}

public function user_data_submit() 
	{
		$swati = array('key' => 1,);
		
//Either you can print value or you can send value to database
	echo json_encode($swati);
}
}