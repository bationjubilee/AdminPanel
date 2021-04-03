<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';


//IMPORT BASECONTROLLER TO ACCESS BASECONTROLLER

class Sms extends BaseController{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Sms_model');
        $this->isLoggedIn();   
       
    } 

    public function index(){
        $this->global['pageTitle'] = 'Barangay : Resident Registration';

        $this->loadViews("compose", $this->global, NULL, NULL);
    }

  

    public function sending(){
        if ($this->input->post('submit')) {
          $name = $this->input->post('res_name');
          $number = $this->input->post('mobile_no');
          $keyword = $this->input->post('Keyword_desc');
          $message = $this->input->post('Message');
          $date = $this->input->post('settle_date');
          $api = "TR-JUBIL430719_33K7W";
          $passwd = '5r32[3p%$m';
          $text = $name." :   the complaint you sent is this: ".$message;
          $att = "hello trish baho";

          //echo $text;
          

          $result = $this->itexmo($number,$att,$api,$passwd);
          if ($result == ""){
            echo "iTexMo: No response from server!!!
            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
            Please CONTACT US for help. ";  
          }else if ($result == 0){
            echo "Message Sent!";
          }
          else{ 
            echo "string". "Error Num ". $result . " was encountered!";
          }
                
        }else{

        }

        $this->loadViews("compose", $this->global, NULL, NULL);
    }

    function itexmo($number,$message,$apicode,$passwd){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        $param = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
          ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
    }
      


    // public function form(){
    //     $this->global['pageTitle'] = 'Barangay : report form';
    //     $this->loadViews("form", $this->global, NULL, NULL); 
    // }

    public function noticeOfHearing(){
        $this->global['pageTitle'] = 'Barangay : report form';
        $this->loadViews("noticeHearing", $this->global, NULL, NULL); 
    }

    public function categorized(){
        $result['data'] = $this->Sms_model->fetch_Catinbox();
        $this->global['pageTitle'] = 'Barangay : categorized';
        $this->loadViews("categorized", $this->global, $result, NULL); 
    }

    public function uncategorized(){
        $result['data'] = $this->Sms_model->fetch_UnCatinbox();
        $this->global['pageTitle'] = 'Barangay : uncategorized';
        $this->loadViews("uncategorized", $this->global, $result, NULL); 
    }

    public function anonymous(){
        $result['data'] = $this->Sms_model->fetch_Anoninbox();
        $this->global['pageTitle'] = 'Barangay : anonymous';
        $this->loadViews("anonymous", $this->global, $result, NULL); 
    }

    function DisplayMessage($smsID)
    {
        $result['messageData'] = $this->Sms_model->fetch_messageDisplay($smsID);
        $this->global['pageTitle'] = 'Barangay : Message Information';
        $this->loadViews("DisplayMessage", $this->global, $result, NULL);
    }

    //--------------------------------COMPLAINT PROCESS---------------------------

    public function residentlist(){
        //post data
        $postData = $this->input->post();

        //get data
        $data = $this->Sms_model->getResident($postData);

        echo json_encode ($data);

    }

    public function form($smsID)
    {
        $data['status'] = $this->Sms_model->get_status();
       
        $data['complaintData'] = $this->Sms_model->fetch_formDisplay($smsID);  

        $this->global['pageTitle'] = 'Barangay : complaint form';
        $this->loadViews("form", $this->global, $data, NULL);

    }

    public function addComplaint(){

        $SMS_ID = $this->input->post('SMS_ID');
        $res_id = $this->input->post("res_id");
        $Keyword_desc = $this->input->post("Keyword_desc");
        $settle_date = $this->input->post("settle_date");
        $date_process =$this->input->post("date_process");
        $Status_ID = $this->input->post('Status_desc');
        
        $complain_info = array('SMS_ID'=>$SMS_ID, "res_id"=>$res_id,"Keyword_desc"=>$Keyword_desc, "settle_date"=>$settle_date,"date_process"=>$date_process,'Status_ID'=>$Status_ID);

        $result = $this->Sms_model->complain_form($complain_info);

            
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'complaint process successfully!');
        }
        
        else
        {
            $this->session->set_flashdata('error', 'complaint process failed');
        }
        
        redirect('dashboard');
    }

    function schedule_query($sched)
    {
        $dayArray = $this->Sms_model->get_days();
        $counter = TRUE;
        $dayName = "";
        foreach ($dayArray as $d) {
            if(strpos($sched, $d->days) !== false)
            {
                $counter = TRUE;
                break;
            }
            else{
                $counter = FALSE;

            }
        }
        return $counter;
    }





}






https://github.com/bationjubilee/messageAlgorithm.git