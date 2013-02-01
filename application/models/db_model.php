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
    function store_school_info($days_off,$total_slots,$total_half_slots,$half_days,$start_mins,$end_mins,$nof_recess,$recess1,$recess2,$lecture_time)
    {
        
        echo '<br/>days_off '; print_r($days_off);
                       echo                            '<br/>total slots '.$total_slots;
                                                   echo '<br/>total half slots '.$total_half_slots;
                                                   echo '<br/>half days '; print_r($half_days);
                                                   echo '<br/>start mins '.$start_mins;
                                                   echo '<br/>end mins '.$end_mins;
                                                   echo '<br/>no of recesses '.$nof_recess;
                                                   echo '<br/>recess 1 '.$recess1;
                                                   echo '<br/>recess 2 '.$recess2;
                                                   echo '<br/>lect time '.$lecture_time;
       //$this->db->query("create table tt_school_info (field varchar(50),value varchar(50))");
       /*foreach($this->input->post('days_off') as $day)
           echo $day."<br/>";*/
        
       if(!empty($days_off))
       {
           $days_off_string = "";
           foreach($days_off as $check) 
                $days_off_string .= $check;
           $this->db->insert("tt_school_info",array("field"=>"days_off","value"=>$days_off_string));
       }
       //$this->db->insert("tt_school_info",array("field"=>"acad_year","value"=>$this->input->post('acad_year')));
    }
}
?>
