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


        if ($_POST) {
            $mobileNo = $_POST['mobileNo'];
            $Message = $_POST['Message'];
            $api = "TR-JOYBA557321_2H9IH";

            $result = $this->itexmo($mobileNo,$Message,$api);
            echo $result;

            

        if (!empty($result)){

            if ($result == ""){ 
                // echo "iTexMo: No response from server!!!
                // Please check the METHOD used (CURL or CURL-LESS). If you are using 
                // CURL then try CURL-LESS and vice versa.  
                //  Please CONTACT US for help. ";  
           } else if ($result == 0){
               echo 'Message sent';
           
           }
            else { 
               echo "Error Num ". $result . " was encountered!";
           }    
          
            }
    
        }
    }
      public function itexmo($mobileNo,$Message,$api){
        $url = 'https://www.itexmo.com/php_api/api.php';
        
        $itexmo = array('1'=> $mobileNo, '2' => $Message, 'api' => $api
            
        
        );
        
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


    public function form(){
        $this->global['pageTitle'] = 'Barangay : report form';
        $this->loadViews("form", $this->global, NULL, NULL); 
    }

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

    function complaint_form()
    {
            $data['incharge'] = $this->Sms_model->get_incharge();
            $data['sms_keyword']=$this->Sms_model->get_keyword();  
            $this->global['pageTitle'] = 'Barangay : complaint form';


            // $incharge['incharge'] = $this->Sms_model->get_incharge();

            $this->loadViews("form", $this->global, $data, NULL);
    }


}




https://github.com/bationjubilee/messageAlgorithm.git