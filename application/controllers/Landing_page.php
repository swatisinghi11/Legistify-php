<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {
public function index()
	{
		$this->load->view('landing_page');
		// $dsn ='mysqli://root:@localhost/legistifyphp';
		//  $dbconnect = $this->load->database($dsn);
		//  // $dbconnect = $this->load->database();


	 //     Load the database model:
	 //      /application/models/simple_model.php 
	 //    $this->load->model('Simple_model');
	    

	 //    /* Create a table if it doesn't exist already */
	 //    $this->Simple_model->create_table();
	    
	    
	 //     Call the "insert_item" entry 
	 //    $this->Simple_model->insert_item('Swati!');

	 //    /* Retrieve the last item  */
	 //    print '<pre>';
	 //    print_r($this->Simple_model->get_last_item());
	 //    print '</pre>';

	 //    /* Retrieve and print the row count */
	 //    $rowcount = $this->Simple_model->get_row_count();
	 //    print '<strong>Row count: ' . $rowcount . '</strong>';
    
	}
public function signin()
	{
		$this->load->view('signin');
	}
public function success()
	{
		$this->load->view('success');
	}

public function signup()
	{
		$this->load->view('signup');
	}

public function authentication()
{
	$dsn ='mysqli://root:@localhost/legistifyphp';
		 $dbconnect = $this->load->database($dsn);
		 $this->load->model('Users_model');
		 $signin = array('username'=>$this->input->post('username'),'password'=>$this->input->post('password'));
		 // $signin = array('username'=>"SwatiSinghi",'password'=>"1");
		 $entered_username = $signin["username"];
		 $query = $this->db->query('SELECT username, uuid, password FROM users where username="'.$entered_username.'"');
		    $row = $query->row();
		    $uuid="none";
		    $success=0;
		    if($row){
		    $username= $row->username;
		    $password= $row->password;
		    $uuid= $row->uuid;
    		    if($password==$signin['password'])
    		    {
    		 //   	echo $row->username;
		    		// echo $row->password;
		    		// echo $row->uuid;
		    		$success=1;


    		    }
    		    else{
    		    	// echo "Wrong pass word";
    		    	$success=-1;
    		    }
    		}
    		else{
    			// echo "user name does not exists.";
    			$success=0;
    		}
    		$uuid_success=array("uuid"=>$uuid,"success"=>$success);
			echo json_encode($uuid_success);
			
}

public function current_user($uuid){
	$dsn ='mysqli://root:@localhost/legistifyphp';
		 $dbconnect = $this->load->database($dsn);
		 $this->load->view('main_page_view');
		 $query = $this->db->query('SELECT username, uuid, firstname,lastname,lawyer FROM users where uuid="'.$uuid.'"');
		 $row = $query->row();
		    if($row){
		    $username= $row->username;
		    $uuid= $row->uuid;
		    $firstname= $row->firstname;
		    $lastname= $row->lastname;
		    $lawyer= $row->lawyer;
		}
		echo "jadhfjhsdfkjhkhsdf";
}

public function update_lawyer_schedule(){

	$dsn ='mysqli://root:@localhost/legistifyphp';
	$dbconnect = $this->load->database($dsn);

	$update_data= array('uuid'=>$this->input->post('uuid'),'date'=>$this->input->post('date'),'slot_info'=>$this->input->post('slot_info'));
	$this->load->model('Schedule_model');
	$this->Schedule_model->create_table();
	$this->Schedule_model->update_schedule($update_data);


}

// public function lawyer_information(){
// 	$lawyer_uuid = $this->input->post('lawyer_uuid');
// 	$user_uuid = $this->input->post('user_uuid');
// 	$query = $this->db->query('select uuid,date,slot_info,name from schedule where uuid="'+lawyer_uuid+'"'');
// 		 $row = $query->row();
// 		    if($row){
// 		    $username= $row->username;
// 		    $uuid= $row->uuid;
// 		    $firstname= $row->firstname;
// 		    $lastname= $row->lastname;
// 		    $lawyer= $row->lawyer;
// 		}
// }

public function appointment_booking(){

	$dsn ='mysqli://root:@localhost/legistifyphp';
	$dbconnect = $this->load->database($dsn);

	$booking_data= array('lawyer_uuid'=>$this->input->post('lawyer_uuid'),'site_user_uuid'=>$this->input->post('site_user_uuid'),'date'=>$this->input->post('date'),'time_slot'=>$this->input->post('time_slot'),'status'=>$this->input->post('status'),'lawyer_name'=>$this->input->post('lawyer_name'),'site_user_name'=>$this->input->post('site_user_name'));
	$this->load->model('Bookings_model');
	$this->Bookings_model->create_table();
	$this->Bookings_model->insert_row($booking_data);
	

}

public function user_data_submit() 
	{
		$dsn ='mysqli://root:@localhost/legistifyphp';
		 $dbconnect = $this->load->database($dsn);
		
		// echo "swati";
		// $swati = array('username'=>"dasv",'lawyer'=>'lawyer','email'=>'email','password'=>'password','firstname'=>'firstname','lastname'=>'lastname');
		
		$signup_credentials = array('username'=>$this->input->post('username'),'lawyer'=>$this->input->post('lawyer'),'email'=>$this->input->post('email'),'password'=>$this->input->post('password'),'firstname'=>$this->input->post('firstname'),'lastname'=>$this->input->post('lastname'));
		$this->load->model('Users_model');
		$this->Users_model->create_table();
		$this->Users_model->insert_row($signup_credentials);

		$this->load->model('Schedule_model');
		$this->Schedule_model->create_table();

		$query = $this->db->query('SELECT * FROM users where username="'.$signup_credentials["username"].'"');
 		$row = $query->row();
		if($row){
		    $username= $row->username;
		    $uuid= $row->uuid;
		    $firstname= $row->firstname;
		    $lastname= $row->lastname;
		    $lawyer= $row->lawyer;
		    if($lawyer == "1"){
				$this->Schedule_model->insert_default_schedule($uuid, $firstname);
			}
		}
		echo "successfully Created";
		// foreach ($query->result() as $row)
		// {
		//     echo $row->uuid;
		//     echo $row->firstname;
		//     echo $row->email;
		// }


		// echo 'Total Results: ' . $query->num_rows();

    
//Either you can print value or you can send value to database
	// echo json_encode($swati);
}
}