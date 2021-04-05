<?php 

class Sms_model extends CI_Model
{
   
   
   function saverecords($sent)
	{
    $this->db->insert('inbox',$sent);
    return $this->db->insert_id();
	}

   function saveoutbox($outbox)
   {
      $this->db->insert('outbox',$outbox);
      return $this->db->insert_id();
      
   }

//---------------INBOX---------------------------------------------
   function fetch_Catinbox()
   {
    $this->db->select("SMS_ID, Message, SMS_Date");
    $this->db->from("sms");
    $this->db->where("SMS_Keyword_ID BETWEEN 1 AND 5 AND res_id !=0");
    $this->db->order_by('SMS_Date ASC');
    $query = $this->db->get();
    return $query->result();
   }

   function fetch_UnCatinbox()
   {
    $this->db->select("SMS_ID, Message, SMS_Date");
    $this->db->from("sms");
    $this->db->where("SMS_Keyword_ID = 0 AND res_id != 0");
    $this->db->order_by('SMS_Date ASC');
    $query = $this->db->get();
    return $query->result();
   }

   function fetch_Anoninbox()
   {
    $this->db->select("res_id, SMS_ID, Message, SMS_Date");
    $this->db->from("sms");
    $this->db->where('res_id =', 0);
    $this->db->order_by('SMS_Date ASC');
    $query = $this->db->get();
    return $query->result();
   }


   function fetch_messageDisplay($smsID)  
    { 
     $this->db->select('SMS_ID, MobileNo, Message, SMS_Date, res_Fname, res_Lname, Keyword_desc');  
     $this->db->from('sms');
     $this->db->join('sms_keyword', 'sms_keyword.SMS_Keyword_ID=sms.SMS_Keyword_ID');
     $this->db->join('resident', 'resident.res_id=sms.res_id');
     $this->db->where('SMS_ID =',$smsID);  
     $query = $this->db->get();  
     return $query->row();  
    }
   
   //--------------------COMPLAINT PROCESS---------------------------------

    function getResident($postData){

      $response = array();                                                
 
      if(isset($postData['search']) ){
        // Select record
        $this->db->select("CONCAT(res_Fname,' ',res_Lname) AS `name`, add_desc");
        $this->db->from('resident');
        $this->db->join('address', 'address.add_id = resident.add_id');
        $this->db->where("CONCAT(res_Fname,' ',res_Lname) like '%".$postData['search']."%' ");
        $records = $this->db->get()->result();
 
        foreach($records as $row ){
           $response[] = array("label"=>$row->name, "address"=>$row->add_desc);
           
        }
 
      }
 
      return $response;
   }

   public function get_keyword()
    {
        $this->db->select('SMS_Keyword_ID, Keyword_desc');
        $this->db->from('sms_keyword');
        $this->db->where('SMS_Keyword_ID !=', -1);
        $query = $this->db->get();
        
        return $query->result();
    }

    public function get_incharge()
    {
       $this->db->select('inCharge_ID, inCharge_person');
       $this->db->from('incharge');
       $this->db->where('inCharge_ID !=', 0 );
       $querys = $this->db->get();

       return $querys->result();

    }

    public function get_incharge_id($inchargeID)
    {
       $this->db->select('schedule_ID');
       $this->db->from('schedule');
       $this->db->where('inCharge_ID =', $inchargeID);
       $querys = $this->db->get();

       return $querys->result();

    }

    public function get_status(){
       $this->db->select('Status_ID, Status_desc');
       $this->db->from('status');
       $this->db->where('Status_ID !=',0);
       $query = $this->db->get();

       return $query->result();
    }



    


    function fetch_formDisplay($smsID)
    {
      $this->db->select('sms.SMS_ID, sms.Message, resident.res_id, resident.res_Fname, resident.res_Lname, sms_keyword.Keyword_desc');  
      $this->db->from('sms');
      $this->db->join('sms_keyword', 'sms_keyword.SMS_Keyword_ID=sms.SMS_Keyword_ID');
      $this->db->join('resident', 'resident.res_id=sms.res_id');
      $this->db->where('SMS_ID =',$smsID);  
      $query = $this->db->get();  
      return $query->row();
    }


        
    function complain_form($complain_info )
    {
        $this->db->trans_start();
        $this->db->insert('complaint', $complain_info );
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function get_time()
    {
      $this->db->select('time.day_time,time.time_id');
      $this->db->from('time');
      $this->db->where('time.time_id != ',0);
      $query = $this->db->get();
      return $query->row();
    }

    function getsched_details()
    {
      $this->db->select('schedules.schedules_id,incharge.incharge_person, schedules.incharge_id, schedules.work_id,  working_days.days, incharge.role');
      $this->db->from('schedules');
      $this->db->join('working_days', 'working_days.work_id=schedules.work_id');
      $this->db->join('incharge', 'incharge.incharge_id=schedules.incharge_id');
      $this->db->where('schedules_id !=', 0);

      $query = $this->db->get();
      return $query->result();
    }

}

?>