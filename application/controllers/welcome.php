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
            $data['school_start_hr'] = $_POST['school_start_hr'];   
            $data['school_end_hr'] = $_POST['school_end_hr'];       // Converting hours to minutes (end time)
            $data['school_start_min'] = $_POST['school_start_min'];
            $data['school_end_min'] = $_POST['school_end_min'];
            
            $start_mins = ($data['school_start_hr'] * 60) + $data['school_start_min'];      // Adding minutes to converted value
            $end_mins = ($data['school_end_hr'] * 60) + $data['school_end_min'];          // Adding minutes to converted value
            
            $data['nof_recess'] = $_POST['nof_recess'];             // Number of recess
            
            $data['recess1_time']=null;                                  // Set both recess time to null (Initialize)
            $data['recess2_time']=null;
            if($data['nof_recess']==0)
                $recess_time = 0;                           // Set recess time to 0 if number of recess is 0
            elseif($data['nof_recess']==1)
            {
                $recess_time = $_POST['recess1_time'];      // Set recess time to 1st recess time if number of recess is 1
                $data['recess1_time'] = $_POST['recess1_time'];          // Set recess 1 time
            }
            elseif($data['nof_recess']==2)
            {
                $recess_time = (int)$_POST['recess1_time'] + (int)$_POST['recess2_time'];   // Set recess time to total of recess 1 and 2 if number of recess is 2
                $data['recess1_time'] = $_POST['recess1_time'];          // Set recess 1 time
                $data['recess2_time'] = $_POST['recess2_time'];          // Set recess 2 time
            }
                
            $total_time = ($end_mins - $start_mins) - $recess_time;   // Set lecture time by subtracting total recess time
            $data['total_slots'] = $this->input->post('total_slots');
            
            $data['acad_year'] = $this->input->post('acad_year');
            $lecture_time = $total_time/$data['total_slots'];   // Time per lecture / lesson / period
            $data['recess1_slot'] = $this->input->post('recess1_slot');
            $data['recess2_slot'] = $this->input->post('recess2_slot');
            $data['days_off'] = null;                           // Set days_off to null (initialize)
            $data['total_half_slots'] = null;                   // Set total_half_slots to null (initialize)
            $data['half_days'] = null;

            if(!empty($_POST['days_off']))              
                $data['days_off'] = $_POST['days_off'];

            if(!empty($_POST['half_day']))
            {
                $data['total_half_slots'] = $this->input->post('total_half_slots');
                $data['half_days'] = $_POST['half_day'];
            }
            
            if($total_time%$data['total_slots']!=0)      // Check if slots can be divided into proper time or not
            {
                //$this->session->set_flashdata('message',"Improper Input! Please re-adjust timing and number of slots");     // If not show message
                $data['message'] = "Improper Input! Please re-adjust timing and number of slots";
                $this->load->view('welcome_message',$data);             // Redirect to same page
                return false;
            }
            else    // If yes then do following
            {
                // Send data to database model
                $this->db_model->store_school_info($data['acad_year'],
                                                   $data['days_off'],
                                                   $data['total_slots'],
                                                   $data['total_half_slots'],
                                                   $data['half_days'],
                                                   $start_mins,
                                                   $end_mins,
                                                   $data['nof_recess'],
                                                   $data['recess1_time'],
                                                   $data['recess2_time'],
                                                   $data['recess1_slot'],
                                                   $data['recess2_slot'],
                                                   $lecture_time);
            }
            redirect('welcome/class_selection');    // Redirect to class selection page
	}
        
        function class_selection()
        {
            $this->load->view('class_selection');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */