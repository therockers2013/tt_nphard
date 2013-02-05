<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Db_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function store_school_info($acad_year,$days_off_string,$total_slots,$total_half_slots,$half_days_string,$start_mins,$end_mins,$nof_recess,$recess1,$recess2,$recess1_slot,$recess2_slot,$lecture_time)
    {
        
       $this->db->query('select * from tt_school_info where field = "acad_year"');
       
       if($this->db->affected_rows()==0)
       {
        $this->db->insert("tt_school_info",array("field"=>"acad_year","value"=>$acad_year));
        $this->db->insert("tt_school_info",array("field"=>"total_slots","value"=>$total_slots));
        $this->db->insert("tt_school_info",array("field"=>"start_mins","value"=>$start_mins));
        $this->db->insert("tt_school_info",array("field"=>"end_mins","value"=>$end_mins));
        $this->db->insert("tt_school_info",array("field"=>"nof_recess","value"=>$nof_recess));
        $this->db->insert("tt_school_info",array("field"=>"recess1","value"=>$recess1));
        $this->db->insert("tt_school_info",array("field"=>"recess2","value"=>$recess2));
        $this->db->insert("tt_school_info",array("field"=>"recess1_slot","value"=>$recess1_slot));
        $this->db->insert("tt_school_info",array("field"=>"recess2_slot","value"=>$recess2_slot));
        $this->db->insert("tt_school_info",array("field"=>"lecture_time","value"=>$lecture_time));
        $this->db->insert("tt_school_info",array("field"=>"days_off","value"=>$days_off_string));
        $this->db->insert("tt_school_info",array("field"=>"half_days","value"=>$half_days_string));
        $this->db->insert("tt_school_info",array("field"=>"total_half_slots","value"=>$total_half_slots));
       }
    }
    
    function get_class_numbers()
    {
        $query = $this->db->query('select * from tt_school_info where field = "classes_from" or field="classes_to"');
        
        if($this->db->affected_rows()==0)
            return NULL;
        else {
            return $query->result_array();
        }
    }
    
    function store_classes_number()
    {
        $this->db->insert('tt_school_info',array('field'=>'classes_from','value'=>$_POST['class_from']));
        $this->db->insert('tt_school_info',array('field'=>'classes_to','value'=>$_POST['class_to']));
    }
}
?>
