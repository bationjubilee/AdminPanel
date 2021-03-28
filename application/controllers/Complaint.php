<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

/**
 * 
 */
class Complaint extends BaseController
{
	
	function __construct(argument)
	{
		parent::__construct();
        $this->load->model('complaintmodel');
        $this->isLoggedIn();
	}

	public function index()
    {
        $this->global['pageTitle'] = 'Barangay : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
}

?>