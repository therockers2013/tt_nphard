<?php include("templates/header.php"); ?>

<style>
    .days_off_section label, .half_day_section label
    {
        display: inline;
    }
    input[type="text"]{
        margin-bottom: 5px;
    }
    legend
    {
        border-bottom: none;
    }
    hr
    {
        clear:both;
        float:none;
    }
    .highlight
    {
        font-size: 14px;
        font-weight: bold;
    }
    .error
    {
        color: #c43c35;
    }
</style>

<script>
    jQuery(document).ready(function(){
        for (i=7; i<18; i++)
            jQuery("#school_start_hr").append('<option value="'+i+'">'+i+'</option>'); 
        for (i=00; i<60; i=i+5)
            jQuery("#school_start_min").append('<option value="'+i+'">'+i+'</option>');
        for (i=12; i<21; i++)
            jQuery("#school_end_hr").append('<option value="'+i+'">'+i+'</option>'); 
        for (i=00; i<60; i=i+5)
            jQuery("#school_end_min").append('<option value="'+i+'">'+i+'</option>');
        for (i=10; i<=60; i=i+5)
        {
            jQuery("#recess1_time").append('<option value="'+i+'">'+i+'</option>');
            jQuery("#recess2_time").append('<option value="'+i+'">'+i+'</option>');
        }
        for (i=5; i<10; i++)
            jQuery("#total_slots").append('<option value="'+i+'">'+i+'</option>');
        
        for (i=2; i<7; i++)
            jQuery("#total_half_slots").append('<option value="'+i+'">'+i+'</option>');
        
        jQuery('input[name="half_day[]"]').live("click",function(){
         // Here we check which boxes in the same group have been selected
         var count = 0;
         // Loop through the checked checkboxes in the same group
         // and add their values to an array
         jQuery('input[name="half_day[]"]:checked').each(function(){
             count++;
         });
         
         if(count==0)
             jQuery(".half_day_slot").hide();
         else
             jQuery(".half_day_slot").show();
        });
        
        jQuery('select[name="nof_recess"]').live("click",function(){
         // Here we check which boxes in the same group have been selected
         if(jQuery('select[name="nof_recess"]').val()=="0")
         {
             jQuery(".recess1").hide();
             jQuery(".recess2").hide();
         }
         if(jQuery('select[name="nof_recess"]').val()=="1")
         {
             jQuery(".recess1").show();
             jQuery(".recess2").hide();
         }
         if(jQuery('select[name="nof_recess"]').val()=="2")
         {
             jQuery(".recess1").show();
             jQuery(".recess2").show();
         }
        });
        
    });
</script>

<div id="container">
    <h1>Welcome to TT NP-Hard Problem!</h1>

    <div id="body">
        <form name="school_info" action="<?php echo base_url('index.php/welcome/schoolInfo');?>" method="post" >
            <br/>
            <p class="span12">Academic Year <input type="text" name="acad_year" class="span2"/></p>
            <hr/>

            <legend class="days_off_section span12">
                <h4>Days Off</h4>
                <fieldset>
                    <input type="checkbox" id="days_off_mon" name="days_off[]" value="1" /><label for="days_off_mon"> Mon</label>
                    <input type="checkbox" id="days_off_tue" name="days_off[]" value="2" /><label for="days_off_tue"> Tue</label>
                    <input type="checkbox" id="days_off_wed" name="days_off[]" value="3" /><label for="days_off_wed"> Wed</label>
                    <input type="checkbox" id="days_off_thu" name="days_off[]" value="4" /><label for="days_off_thu"> Thu</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="days_off_fri" name="days_off[]" value="5" /><label for="days_off_fri"> Fri</label>
                    <input type="checkbox" id="days_off_sat" name="days_off[]" value="6" /><label for="days_off_sat"> Sat</label>
                    <input type="checkbox" id="days_off_sun" name="days_off[]" value="7" /><label for="days_off_sun"> Sun</label>
                </fieldset>
            </legend>
            <hr/>
            <div class="span5">
                <h4>Full day timing</h4>
                <p>School Start Time (Excluding Prayer) 
                    <select name="school_start_hr" id ="school_start_hr" class="span1"></select> Hrs.
                    <select name="school_start_min" id ="school_start_min" class="span1"></select> Min.
                </p>
                <p>School End Time 
                    <select name="school_end_hr" id ="school_end_hr" class="span1"></select> Hrs.
                    <select name="school_end_min" id ="school_end_min" class="span1"></select> Min.
                </p>
            </div>
            <div class="span5">
                <p class="highlight">Total number of lecture slots 
                    <select name="total_slots" id ="total_slots" class="span1"></select>
                </p>
            </div>
            <hr/>

            <legend class="half_day_section span5">
                <h4>Half Days</h4>
                <fieldset>
                    <input type="checkbox" id="half_day_mon" name="half_day[]" value="1" /><label for="half_day_mon"> Mon</label>
                    <input type="checkbox" id="half_day_tue" name="half_day[]" value="2" /><label for="half_day_tue"> Tue</label>
                    <input type="checkbox" id="half_day_wed" name="half_day[]" value="3" /><label for="half_day_wed"> Wed</label>
                    <input type="checkbox" id="half_day_thu" name="half_day[]" value="4" /><label for="half_day_thu"> Thu</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="half_day_fri" name="half_day[]" value="5" /><label for="half_day_fri"> Fri</label>
                    <input type="checkbox" id="half_day_sat" name="half_day[]" value="6" /><label for="half_day_sat"> Sat</label>
                    <input type="checkbox" id="half_day_sun" name="half_day[]" value="7" /><label for="half_day_sun"> Sun</label>
                </fieldset>
            </legend>
            <legend class="half_day_slot span5 hide">
                <p class="highlight">Total number of slots for half day 
                    <select name="total_half_slots" id ="total_half_slots" class="span1"></select>
                </p>
            </legend>
            <hr/>
            <div class="span5">
                <p class="highlight">Select number of recesses 
                    <select name="nof_recess" class="span1">
                        <option value="0">0</option>
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                    </select> 
                </p>
            </div>
            <div class="span5 recess_timing">
                <div class="recess1">
                    <p class="highlight">Select Time (in minutes) for Recess 1
                        <select name="recess1_time" id ="recess1_time" class="span1"></select> Min.
                    </p>
                </div>
                <div class="hide recess2">
                    <p class="highlight">Select Time (in minutes) for Recess 2
                        <select name="recess2_time" id ="recess2_time" class="span1"></select> Min.
                    </p>
                </div>
            </div>
            <hr/>
            <div class="span6">
                <p><input type="submit" value="Submit Information" class="span2 btn btn-info"/>
                    <span class="error"><?php echo $this->session->flashdata('message'); ?></span>
                </p>
            </div>
            <div class="clearfix"></div>
        </form>
        
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>