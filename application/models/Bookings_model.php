<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings_model extends CI_Model {
  
  
  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
  }

  function insert_row($data)
  {
    // $signup = "INSERT INTO users VALUES (".$swati['uuid'].",".$swati['username'].",".$swati['lawyer'].",".$swati['email'].",".$swati['password'].",".$swati['firstname'].", ".$swati['lastname'].",".$swati['imageId'].",".$swati['details'].",)";
        // $this->db->query($sql);
        $this->db->set('uuid','UUID()',FALSE);
        // $this->uuid = "uuid";
        $this->username = $data['username'];
        $this->lawyer = $data['lawyer'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->imageId = 1;
        $this->details = "Details not available";

        
        $this->db->insert('users',$this);
  }  

  function create_table()
  { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
    
    
    /* Specify the table schema */
    $fields = array(
                    'lawyer_uuid' => array(
                                  'type' => 'text'
                              ),
                    'site_user_uuid' => array(
                                  'type'=>'text'
                              ),
                    'date'=> array(
                                    'type'=>'text'
                                    ),
                    'time_slot'=>array(
                                    'type'=>'text'
                                    ),
                    'status' => array(
                                  'type' => 'text'
                              ),
                    'lawyer_name' => array(
                                  'type'=>'text'
                              ),
                    'site_user_name'=> array(
                                    'type'=>'text'
                                    )
                    // 'date TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
              );
    
    /* Add the field before creating the table */
    $this->dbforge->add_field($fields);
    
    
    /* Specify the primary key to the 'id' field */    
    
    /* Create the table (if it doesn't already exist) */
    $this->dbforge->create_table('bookings', TRUE);
  } 


}