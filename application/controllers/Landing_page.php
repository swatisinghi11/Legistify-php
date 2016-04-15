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
}