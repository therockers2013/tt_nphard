<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
        public function __construct()
	{
		parent::__construct();
                $this->load->library('session');
                $this->load->helper('url');
        }
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function generalInfo()
	{
            $start_mins = $_POST['school_start_hr'] * 60;
            $end_mins = $_POST['school_end_hr'] * 60;
            $start_mins += $_POST['school_start_min'];
            $end_mins += $_POST['school_end_min'];
            
            $nof_recess = $_POST['nof_recess'];
            
            if($nof_recess==0)
                $recess_time = 0;
            elseif($nof_recess==1)
                $recess_time = $_POST['recess1_time'];
            elseif($nof_recess==2)
                $recess_time = $_POST['recess2_time'];
                
            $total_time = ($end_mins - $start_mins) - $recess_time;
            
            if($total_time%$_POST['total_slots']!=0)
            {
                $this->load->view('welcome_message');
                $this->session->set_flashdata('message',"Improper Input! Please re-adjust timing and number of slots");
            }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */