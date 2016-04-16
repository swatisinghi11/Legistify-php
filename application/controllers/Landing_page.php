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
		//  $query = $this->db->query('SELECT username, uuid, firstname,lastname,lawyer FROM users where uuid="'.$uuid.'"');
		//  $row = $query->row();
		//     if($row){
		//     $username= $row->username;
		//     $uuid= $row->uuid;
		//     $firstname= $row->firstname;
		//     $lastname= $row->lastname;
		//     $lawyer= $row->lawyer;
		// }
		// echo "jadhfjhsdfkjhkhsdf";
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

public function mainpage_initialisation(){
	echo "mainpage";
	$dsn ='mysqli://root:@localhost/legistifyphp';
		$dbconnect = $this->load->database($dsn);
		$all_data=array();
		$this->load->model('Users_model');
		$mainpage_uuid = array('uuid'=>$this->input->post('uuid'));
		$uuid = $mainpage_uuid["uuid"];
		$query = $this->db->query('SELECT username, uuid, firstname,lastname,lawyer FROM users where uuid="'.$uuid.'"');
		$row = $query->row();
		$username="none";
		$lawyer=0;
	    if($row){
		    $username= $row->username;
		    $uuid= $row->uuid;
		    $firstname= $row->firstname;
		    $lastname= $row->lastname;
		    $lawyer= $row->lawyer;
		    $current_user=array("uuid"=>$uuid,"username"=>$username,"firstname"=>$firstname,"lastname"=>$lastname,"lawyer"=>$lawyer);
		    $all_data['current_user']=$current_user;
		}

		if($lawyer==1)
		{
			$dsn ='mysqli://root:@localhost/legistifyphp';
			$dbconnect = $this->load->database($dsn);
			$this->load->model('Schedule_model');
			$query = $this->db->query('SELECT uuid,date,slot_info,name FROM schedule where uuid="'.$uuid.'"');
			
			$row = $query->row();
			if($row){
			    $uuid= $row->uuid;
			    $date= $row->date;
			    $slot_info= $row->slot_info;
			    $name= $row->name;
				$lawyer_schedule=array("uuid"=>$uuid,"date"=>$date,"slot_info"=>$slot_info,"name"=>$name);
				$all_data['lawyer_schedule']=$lawyer_schedule;

			}

			$this->load->model('Bookings_model');
			$query = $this->db->query('SELECT lawyer_uuid,site_user_uuid,date,time_slot,status,lawyer_name,site_user_name FROM bookings where lawyer_uuid="'.$uuid.'"');
			$row = $query->row();
			if($row){
			    $lawyer_uuid= $row->lawyer_uuid;
			    $site_user_uuid= $row->site_user_uuid;
			    $date= $row->date;
			    $time_slot= $row->time_slot;
			    $status= $row->status;
			    $lawyer_name= $row->lawyer_name;
			    $site_user_name= $row->site_user_name;
				$appointment_request_list=array("_lawyer_uuid"=>$lawyer_uuid,"site_user_uuid"=>$site_user_uuid,"date"=>$date,"time_slot"=>$time_slot,"status"=>$status,"lawyer_name"=>$lawyer_name,"site_user_name"=>$site_user_name);
				$all_data['appointment_request_list']=$appointment_request_list;
			}
		}
		else{
			$dsn ='mysqli://root:@localhost/legistifyphp';
			$dbconnect = $this->load->database($dsn);
			$this->load->model('Schedule_model');
			$all_lawyers=array();
			$query = $this->db->query('SELECT uuid,username,firstname,lastname,lawyer,email,imageId,details FROM users where lawyer="1"');
			foreach ($query->result() as $row)
				{
					$username= $row->username;
				    $uuid= $row->uuid;
				    $firstname= $row->firstname;
				    $lastname= $row->lastname;
				    $lawyer= $row->lawyer;
				    $email= $row->email;
				    $imageId= $row->imageId;
				    $details= $row->details;
		    		$lawyer_detail=array("uuid"=>$uuid,"username"=>$username,"firstname"=>$firstname,"lastname"=>$lastname,"lawyer"=>$lawyer,"email"=>$email,"imageId"=>$imageId,"details"=>$details);
		    		$all_lawyers[]=$lawyer_detail;
				}
			
				$all_data['all_lawyers']=$all_lawyers;

			}

		}
		echo json_encode($all_data);
	}
}