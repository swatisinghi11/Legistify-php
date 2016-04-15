<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
public function index()
	{
		$this->load->view("ajax_post_view");
	}
public function user_data_submit() 
	{
		// $data = array(
		// 'username' => $this->input->post('name'),
		// 'pwd'=>$this->input->post('pwd')
		// );
		echo "calling.............";
		echo $this->input->post('first');
//Either you can print value or you can send value to database
// echo json_encode($data);
}
}
