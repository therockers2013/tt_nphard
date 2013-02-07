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
        border-bottom-color: #c6c6c6;
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
        var date = new Date();
        for (i=date.getFullYear(); i<date.getFullYear()+10; i++)
        {
            var value = <?php if(isset($acad_year)) echo $acad_year; else echo '"none"';?>;
            if(value==i)
                jQuery("#acad_year").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#acad_year").append('<option value="'+i+'">'+i+'</option>'); 
        }
        for (i=7; i<18; i++)
        {
            var value = <?php if(isset($school_start_hr)) echo $school_start_hr; else echo '"none"';?>;
            if(value==i)
                jQuery("#school_start_hr").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#school_start_hr").append('<option value="'+i+'">'+i+'</option>'); 
        }
        for (i=00; i<60; i=i+5)
        {
            var value = <?php if(isset($school_start_min)) echo $school_start_min; else echo '"none"';?>;
            if(value==i)
                jQuery("#school_start_min").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#school_start_min").append('<option value="'+i+'">'+i+'</option>');
        }
        for (i=12; i<21; i++)
        {
            var value = <?php if(isset($school_end_hr)) echo $school_end_hr; else echo '"none"';?>;
            if(value==i)
                jQuery("#school_end_hr").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#school_end_hr").append('<option value="'+i+'">'+i+'</option>'); 
        }
        for (i=00; i<60; i=i+5)
        {
            var value = <?php if(isset($school_end_min)) echo $school_end_min; else echo '"none"';?>;
            if(value==i)
                jQuery("#school_end_min").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#school_end_min").append('<option value="'+i+'">'+i+'</option>');
        }
        for (i=0; i<3; i++)
        {
            var value = <?php if(isset($nof_recess)) echo $nof_recess; else echo '"none"';?>;
            if(value==i || i==1)
            {
                jQuery("#nof_recess").append('<option value="'+i+'" selected>'+i+'</option>');
                if(i==2)
                    jQuery(".recess2").show();
            }
            else
                jQuery("#nof_recess").append('<option value="'+i+'">'+i+'</option>');
        }
        for (i=10; i<=60; i=i+5)
        {
            var value = <?php if(isset($recess1_time)) echo $recess1_time; else echo '"none"';?>;
            if(value==i)
                jQuery("#recess1_time").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#recess1_time").append('<option value="'+i+'">'+i+'</option>');
            
            
            value = <?php if(isset($recess2_time)) echo $recess2_time; else echo '"none"';?>;
            if(value==i)
                jQuery("#recess2_time").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#recess2_time").append('<option value="'+i+'">'+i+'</option>');
        }
        for (i=5; i<10; i++)
        {
            var value = <?php if(isset($total_slots)) echo $total_slots; else echo '"none"';?>;
            if(value==i)
                jQuery("#total_slots").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#total_slots").append('<option value="'+i+'">'+i+'</option>');
        }
        for (i=2; i<7; i++)
        {
            var value = <?php if(isset($total_half_slots)) echo $total_half_slots; else echo '"none"';?>;
            if(value==i)
                jQuery("#total_half_slots").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#total_half_slots").append('<option value="'+i+'">'+i+'</option>');
        }
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
        
        var slot = $('#total_slots option:selected').html();
        
        for(i=1; i<slot; i++)
        {
            var value = <?php if(isset($recess1_slot)) echo $recess1_slot; else echo '"none"';?>;
            if(value==i)
                jQuery("#recess1_slot").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#recess1_slot").append('<option value="'+i+'">'+i+'</option>');
        }
        for(i=parseInt(slot/2,10); i<slot; i++)
        {
            var value = <?php if(isset($recess2_slot)) echo $recess2_slot; else echo '"none"';?>;
            if(value==i)
                jQuery("#recess2_slot").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#recess2_slot").append('<option value="'+i+'">'+i+'</option>');
        }      
        
        var days_off = <?php if(isset($days_off_string)) echo $days_off_string; else echo '"none"';?>;
        if(days_off!="none")
        {
            var day;
            while(days_off!=0)
                {
                    day = days_off%10;
                    jQuery('.days_off').eq(day-1).attr('checked','checked');
                    days_off = parseInt(days_off/10,10);
                }
        }
        
        var half_days = <?php if(isset($half_days_string)) echo $half_days_string; else echo '"none"';?>;
        if(half_days!="none")
        {
            jQuery(".half_day_slot").show();
            var day;
            while(half_days!=0)
                {
                    day = half_days%10;
                    jQuery('.half_days').eq(day-1).attr('checked','checked');
                    half_days = parseInt(half_days/10,10);
                }
        }
        
        jQuery("#total_slots").live('change', function(){
            slot = this.value;
            jQuery("#recess1_slot").text("");
            jQuery("#recess2_slot").text("");
            
            for(i=1; i<slot; i++)
                jQuery("#recess1_slot").append('<option value="'+i+'">'+i+'</option>');
             
            for(i=parseInt(slot/2,10); i<this.value; i++)
                jQuery("#recess2_slot").append('<option value="'+i+'">'+i+'</option>');
        });
        
    });
</script>

<div id="container">
    <h1 class="span5">General School Information</h1>
    <a href="<?php echo base_url('index.php/TimeTable/rooms');?>"><img class="nav-links pull-right" alt="Teachers Info" src="<?php echo base_url('images/teachers_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/rooms');?>"><img class="nav-links pull-right" alt="Rooms Info" src="<?php echo base_url('images/rooms_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/subjects_selection');?>"><img class="nav-links pull-right" alt="Subjects Info" src="<?php echo base_url('images/subjects_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/class_selection');?>"><img class="nav-links pull-right" alt="Classes Info" src="<?php echo base_url('images/classes_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/school_info');?>"><img class="nav-links pull-right" alt="General Info" src="<?php echo base_url('images/school_info_thumb.png');?>" /></a>
    
    <hr/>
    <div id="body">
        <form name="school_info" action="<?php echo base_url('index.php/TimeTable/schoolInfo');?>" method="post" >
            <br/>
            <p class="span12">Academic Year 
                <select name="acad_year" id ="acad_year" class="span1"></select>
            </p>
            <hr/>

            <legend class="days_off_section span12">
                <h4>Days Off</h4>
                <fieldset>
                    <input type="checkbox" id="days_off_mon" class="days_off" name="days_off[]" value="1" /><label for="days_off_mon"> Mon</label>
                    <input type="checkbox" id="days_off_tue" class="days_off" name="days_off[]" value="2" /><label for="days_off_tue"> Tue</label>
                    <input type="checkbox" id="days_off_wed" class="days_off" name="days_off[]" value="3" /><label for="days_off_wed"> Wed</label>
                    <input type="checkbox" id="days_off_thu" class="days_off" name="days_off[]" value="4" /><label for="days_off_thu"> Thu</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="days_off_fri" class="days_off" name="days_off[]" value="5" /><label for="days_off_fri"> Fri</label>
                    <input type="checkbox" id="days_off_sat" class="days_off" name="days_off[]" value="6" /><label for="days_off_sat"> Sat</label>
                    <input type="checkbox" id="days_off_sun" class="days_off" name="days_off[]" value="7" /><label for="days_off_sun"> Sun</label>
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
                    <input type="checkbox" id="half_day_mon" class="half_days" name="half_day[]" value="1" /><label for="half_day_mon"> Mon</label>
                    <input type="checkbox" id="half_day_tue" class="half_days" name="half_day[]" value="2" /><label for="half_day_tue"> Tue</label>
                    <input type="checkbox" id="half_day_wed" class="half_days" name="half_day[]" value="3" /><label for="half_day_wed"> Wed</label>
                    <input type="checkbox" id="half_day_thu" class="half_days" name="half_day[]" value="4" /><label for="half_day_thu"> Thu</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="half_day_fri" class="half_days" name="half_day[]" value="5" /><label for="half_day_fri"> Fri</label>
                    <input type="checkbox" id="half_day_sat" class="half_days" name="half_day[]" value="6" /><label for="half_day_sat"> Sat</label>
                    <input type="checkbox" id="half_day_sun" class="half_days" name="half_day[]" value="7" /><label for="half_day_sun"> Sun</label>
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
                    <select name="nof_recess" id="nof_recess" class="span1">
                        
                    </select> 
                </p>
            </div>
            <div class="span6 recess_timing">
                <div class="recess1">
                    <p class="highlight">Select Time (in minutes) for Recess 1
                        <select name="recess1_time" id ="recess1_time" class="span1"></select> Min.
                    </p>
                    <p class="highlight">Place <em><u>recess 1</u></em> after slot 
                        <select name="recess1_slot" id ="recess1_slot" class="span1"></select>
                    </p>
                </div>
                <div class="hide recess2">
                    <p class="highlight">Select Time (in minutes) for Recess 2
                        <select name="recess2_time" id ="recess2_time" class="span1"></select> Min.
                    </p>
                    <p class="highlight">Place <em><u>recess 2</u></em> after slot 
                        <select name="recess2_slot" id ="recess2_slot" class="span1"></select>
                    </p>
                </div>
            </div>
            <hr/>
            <div class="span7">
                <p><input type="submit" value="Submit Information" class="span2 btn btn-info submit"/>
                    <span class="error"><?php if(isset($message)) echo $message;//echo $this->session->flashdata('message'); ?></span>
                </p>
            </div>
            <div class="clearfix"></div>
       </form>
        
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>