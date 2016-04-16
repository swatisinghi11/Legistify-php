<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Schedule_model extends CI_Model {
  
  
  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
  }

  function insert_default_schedule($uuid, $firstname)
  {   
        $next_day =  date('d-m-Y', strtotime(' +1 day'));
        $this->uuid = $uuid;
        $this->name = $firstname;
        $this->date = $next_day;
        $this->slot_info = "1100-1300:1,1500-1700:1,1900-2100:1";
        
        $this->db->insert('schedule',$this);
  }  

  function update_schedule($update_data){
      $this->db->where('uuid',$update_data["uuid"]);
      $this->db->where('date',$update_data["date"]);
      $data=array('slot_info'=>$update_data["slot_info"]);
      $this->db->update('schedule',$data);
      echo NULL;
  }


  function create_table()
  { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
    
    
    /* Specify the table schema */
    $fields = array(
                    'uuid' => array(
                                  'type' => 'text'
                              ),
                    'date' => array(
                                  'type'=>'text'
                              ),
                    'slot_info'=> array(
                                    'type'=>'text'
                                    ),
                    'name'=>array(
                                    'type'=>'text'
                                    )
                    // 'date TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
              );
    
    /* Add the field before creating the table */
    $this->dbforge->add_field($fields);
    
    
    /* Specify the primary key to the 'id' field */
    
    /* Create the table (if it doesn't already exist) */
    $this->dbforge->create_table('schedule', TRUE);
  } 


}