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
                $this->load->library('session');            // For Maintaining Session
                $this->load->helper('url');                 // For base_url
                $this->load->model('db_model');             // For including database model
        }
	public function index()
	{
		$this->load->view('welcome_message');       // Starting interface (welcome screen)
	}
	
	public function schoolInfo()
	{
            $start_mins = $_POST['school_start_hr'] * 60;   // Converting hours to minutes (start time)
            $end_mins = $_POST['school_end_hr'] * 60;       // Converting hours to minutes (end time)
            $start_mins += $_POST['school_start_min'];      // Adding minutes to converted value
            $end_mins += $_POST['school_end_min'];          // Adding minutes to converted value
            
            $nof_recess = $_POST['nof_recess'];             // Number of recess
            
            $recess1=null;                                  // Set both recess time to null (Initialize)
            $recess2=null;
            if($nof_recess==0)
                $recess_time = 0;                           // Set recess time to 0 if number of recess is 0
            elseif($nof_recess==1)
            {
                $recess_time = $_POST['recess1_time'];      // Set recess time to 1st recess time if number of recess is 1
                $recess1 = $_POST['recess1_time'];          // Set recess 1 time
            }
            elseif($nof_recess==2)
            {
                $recess_time = (int)$_POST['recess1_time'] + (int)$_POST['recess2_time'];   // Set recess time to total of recess 1 and 2 if number of recess is 2
                $recess2 = $_POST['recess2_time'];          // Set recess 2 time
            }
                
            $total_time = ($end_mins - $start_mins) - $recess_time;   // Set lecture time by subtracting total recess time
            $total_slots = $this->input->post('total_slots');
            
            if($total_time%$total_slots!=0)      // Check if slots can be divided into proper time or not
            {
                $this->session->set_flashdata('message',"Improper Input! Please re-adjust timing and number of slots");     // If not show message
            }
            elseif(empty($_POST['acad_year']))
            {
                $this->session->set_flashdata('empty_acad',"Please enter academic year");     // If not show message
            }
            else    // If yes then do following
            {
                $acad_year = $this->input->post('acad_year');
                $lecture_time = $total_time/$total_slots;   // Time per lecture / lesson / period
                $days_off = null;                           // Set days_off to null (initialize)
                $total_half_slots = null;                   // Set total_half_slots to null (initialize)
                $half_days = null;
                
                if(!empty($_POST['days_off']))              
                    $days_off = $_POST['days_off'];
                
                if(!empty($_POST['half_day']))
                {
                    $total_half_slots = $this->input->post('total_half_slots');
                    $half_days = $_POST['half_day'];
                }
                
                $this->db_model->store_school_info($acad_year,
                                                   $days_off,
                                                   $total_slots,
                                                   $total_half_slots,
                                                   $half_days,
                                                   $start_mins,
                                                   $end_mins,
                                                   $nof_recess,
                                                   $recess1,
                                                   $recess2,
                                                   $lecture_time);
            }
            redirect('welcome');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */