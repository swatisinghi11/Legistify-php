<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {
public function index()
	{
		// $this->load->view('landing_page');
		$dsn ='mysqli://root:@localhost/legistifyphp';
		 $dbconnect = $this->load->database($dsn);
		 // $dbconnect = $this->load->database();


	    /* Load the database model:
	      /application/models/simple_model.php */
	    $this->load->model('Simple_model');
	    

	    /* Create a table if it doesn't exist already */
	    $this->Simple_model->create_table();
	    
	    
	    /* Call the "insert_item" entry */
	    $this->Simple_model->insert_item('Swati!');

	    /* Retrieve the last item  */
	    print '<pre>';
	    print_r($this->Simple_model->get_last_item());
	    print '</pre>';

	    /* Retrieve and print the row count */
	    $rowcount = $this->Simple_model->get_row_count();
	    print '<strong>Row count: ' . $rowcount . '</strong>';
    
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
		$dsn ='mysqli://root:@localhost/legistifyphp';
		 $dbconnect = $this->load->database($dsn);
		
		// $bestu= $this->input->post('key');
		// echo "swati";
		// $swati = array('username'=>"dasv",'lawyer'=>'lawyer','email'=>'email','password'=>'password','firstname'=>'firstname','lastname'=>'lastname');
		$swati = array('username'=>$this->input->post('username'),'lawyer'=>$this->input->post('lawyer'),'email'=>$this->input->post('email'),'password'=>$this->input->post('password'),'firstname'=>$this->input->post('firstname'),'lastname'=>$this->input->post('lastname'));
		$this->load->model('Users_model');
		$this->Users_model->create_table();
		$this->Users_model->insert_row($swati);

		$query = $this->db->query('SELECT * FROM users');

		foreach ($query->result() as $row)
		{
		    echo $row->uuid;
		    echo $row->firstname;
		    echo $row->email;
		}

		echo 'Total Results: ' . $query->num_rows();

    
//Either you can print value or you can send value to database
	// echo json_encode($swati);
}
}