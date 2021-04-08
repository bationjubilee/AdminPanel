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
    
########---TO REFRESH AND CATEGORIZE NEW SMS---------###########
    public function messages(){
        $this->global['pageTitle'] = 'Barangay : Resident Registration';
        $data = $this->parsedataCAT();
        $this->loadViews("message", $this->global, $data, NULL);
    }

############------SMS PROCESS-------------###################

    function parsemessage($originator,$gateway,$message,$timestamp)
    {
        
        $extractFirstLine = explode("\n", $message);
        $messageArr = explode(' ', $extractFirstLine[0]);
        $keyword = preg_replace('/\s+/', '', $messageArr[0]);

        $resultingKeyword = $this->Sms_model->isKeyworExist($keyword);
        $resultKeyNum = $resultingKeyword[0]->SMS_Keyword_ID;

        $res_id = $this->confirmMobile($originator);

        echo $res_id;
        print "<br/>";
        echo $resultKeyNum;

        if (empty($resultingKeyword)) {
            $this->passCat(
                $originator,
                $message,
                0,
                $res_id,
                $gateway,
                $timestamp
            );

        } else {
            $this->passCat(
            $originator,
            $message,
            $resultKeyNum,
            $res_id,
            $gateway,
            $timestamp
            );


            }
            $this->getVal_keyNum($resultKeyNum,$res_id,$originator);  
        
    }
    public function parsedataCAT()
    {
        $JSON = file_get_contents('https://www.itexmo.com/php_api/display_messages.php?apicode=DE-JUBIL430719_XQR53');
        $CONVERTED = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $JSON);
        $jsonVar = json_decode($CONVERTED, TRUE);


         foreach ($jsonVar as $data){  
          if (count($data) == 4){ // skip yung result
             $originator = $data['originator'];
             $gateway = $data['message_id'];
             $message = $data['message'];
             $timestamp = $data['timestamp'];

             $varVerify = $this->verify_repeat($gateway);

             if ($varVerify == false) {
                $this->parsemessage($originator,$gateway,$message,$timestamp);

             }else{
            
             }

           } 
         }

        }
    

    function passCat($originator,$message,$SMS_Keyword_ID,$res_id,$gateway,$timestamp){
        $savedata = array('originator' =>$originator, 'message' =>$message, 'SMS_Keyword_ID' =>$SMS_Keyword_ID, 'res_id' =>$res_id, 'gateway' => $gateway, 'sms_statusID' => 0, 'timestamp' => $timestamp);
        $this->Sms_model->getSave($savedata);

    }

    function confirmMobile($originator)
    {
        $mobileReturn = 0;
        $counter = 'FALSE';
        $mobileArr = $this->Sms_model->isMobileExist();
        foreach ($mobileArr as $mob) {
                if (strpos($originator, $mob->mobile_no) !== false) {
                    $mobileReturn = $mob->res_id;
                    $counter = 'TRUE';
                    break;
                }
                else{
                    $counter = 'FALSE'; 
                }
        }

        return $mobileReturn;
    }

    function verify_repeat($gateway)
    {
        $counter = false;
        $message_id = $this->Sms_model->fetch_sms();
        $a = json_encode($message_id);
        
        foreach ($message_id as $id) {
            $b  = $id->gateway;
            if($gateway == $b){
                $counter = true;
                break;
            }else{
                
                $counter = false;
            }
        }
        return $counter;
    }

    function saveMessageData()
    {

    }

    function itexmo($number,$messages,$apicode,$passwd){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $messages, '3' => $apicode, 'passwd' => $passwd);
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

    function send_reply($originator){
        $number = $originator;
        $msg = "Ang kini nga mensahe nagpahibalo nga imong number wala pa na rehistro sa system sa barangay o dili mao ang keyword sa imong reklamo. 
        Mamahimo nga iparehistro usa imong number o itarong ang format sa imong reklamo.
        1. Sa unang linya mao ang keyword
        2. Sunod na mga linya mao na imong reklamo. 
        Ang mga mosunod mao ang keyword na imong gamiton:
        Peace and Order
        Land Problems
        Health and Sanitation
        VAWC
        Environment";
        $api = "DE-JUBIL430719_XQR53";
        $passwd = 'j#%zjl{}i(';

        $result = $this->itexmo($number,$msg,$api,$passwd);
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
    }

    function getVal_keyNum($key,$num,$originator){
        if ($key == 0 || $num == 0){
            $this->send_reply($originator);
        }else{

        }
    }
  

################----CATEGORIZED SMS----------##################
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
        $data['sched_data'] =  $this->Sms_model->getsched_details(); 
        $data['time_data'] = $this->Sms_model->get_time();
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
        $time_id = $this->input->post('time_id');
        
        $complain_info = array('SMS_ID'=>$SMS_ID, "res_id"=>$res_id,"Keyword_desc"=>$Keyword_desc, "settle_date"=>$settle_date,"date_process"=>$date_process,'Status_ID'=>$Status_ID, 'time_id'=>$time_id);

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

    function settle_dateQuery(){
        $data['datas'] = $this->Sms_model->getsched_details();
        return $data;
        $this->global['pageTitle'] = 'Barangay : complaint form';
        $this->loadViews("form", $this->global, $data, NULL);

    }

//-----------------------schedules -----------------------------------------------------------------------------

function get_displayDate(){
    $settle_date = $this->input->post('settle_date');
    $settle_day = $this->input->post('days_display');


    $settle_info = array('settle_date'=>$settle_info, 'days_display'=>$settle_day);
}
    









}






https://github.com/bationjubilee/messageAlgorithm.git
