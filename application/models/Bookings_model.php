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
    
        $this->lawyer_uuid = $data['lawyer_uuid'];
        $this->site_user_uuid = $data['site_user_uuid'];
        $this->date = $data['date'];
        $this->time_slot = $data['time_slot'];
        $this->status = $data['status'];
        $this->lawyer_name = $data['lawyer_name'];
        $this->site_user_name = $data['site_user_name'];;

        
        $this->db->insert('bookings',$this);
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