<?php include("templates/header.php"); ?>

<style>
    input[type="submit"]
    {
        margin-bottom: 9px;
    }
    
</style>

<script>
    jQuery(document).ready(function(){
        
        var classes_from = "<?php if($class_numbers!=NULL) echo $class_numbers[0]['value']; else echo 'none';?>";
        var classes_to = "<?php if($class_numbers!=NULL) echo $class_numbers[1]['value']; else echo 'none';?>";
        
        if(classes_from=="Nursery")
        {
            jQuery("#class_from").append('<option value="Nursery" selected>Nursery</option>');
            jQuery("#selected_class").append('<option value="nursery">Nursery</option>');
            jQuery("#selected_class").append('<option value="lkg">LKG</option>');
            jQuery("#selected_class").append('<option value="ukg">UKG</option>');
        }
        else
            jQuery("#class_from").append('<option value="Nursery">Nursery</option>');
        
        if(classes_from=="LKG")
        {    
            jQuery("#class_from").append('<option value="LKG" selected>LKG</option>');
            jQuery("#selected_class").append('<option value="lkg">LKG</option>');
            jQuery("#selected_class").append('<option value="ukg">UKG</option>');
        }
        else
            jQuery("#class_from").append('<option value="LKG">LKG</option>');
        
        if(classes_from=="UKG")
        {
            jQuery("#class_from").append('<option value="UKG" selected>UKG</option>');
            jQuery("#selected_class").append('<option value="ukg">UKG</option>');
        }
        else
            jQuery("#class_from").append('<option value="UKG">UKG</option>');
        
        var arr = [ "Nursery", "LKG", "UKG" ];
        
        if(classes_from!="none")
        {
            jQuery(".select_class").show();
            if((jQuery.inArray(classes_from, arr)==-1))
            {
                for (i=parseInt(classes_from); i <= classes_to; i++)
                {
                    jQuery("#selected_class").append('<option value="'+i+'">'+i+'</option>');
                }
            }    
            else
                for (i=1; i<=classes_to; i++)
                    jQuery("#selected_class").append('<option value="'+i+'">'+i+'</option>');
        }
        for (i=1; i<13; i++)
        {
            if(classes_from==i)
                jQuery("#class_from").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#class_from").append('<option value="'+i+'">'+i+'</option>'); 
            
            if(classes_to==i)
                jQuery("#class_to").append('<option value="'+i+'" selected>'+i+'</option>'); 
            else
                jQuery("#class_to").append('<option value="'+i+'">'+i+'</option>'); 
        }
        
       jQuery("i").click(function()
       {
            var idno = jQuery(this).index();
            jQuery(".div-flap").eq(idno).slideToggle('fast');
            jQuery(this).toggleClass('icon-plus-sign icon-minus-sign');
            jQuery(".div-title").eq(idno).toggleClass('open-title close-title');
       });
       
       jQuery("h4.div-title").eq(0).css({'margin-top':'0'});
        
    });
</script>

<div id="container">
    <h1 class="span5">Classes Information</h1>
    <a href="<?php echo base_url('index.php/TimeTable/rooms');?>"><img class="nav-links pull-right" alt="Teachers Info" src="<?php echo base_url('images/teachers_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/rooms');?>"><img class="nav-links pull-right" alt="Rooms Info" src="<?php echo base_url('images/rooms_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/subjects_selection');?>"><img class="nav-links pull-right" alt="Subjects Info" src="<?php echo base_url('images/subjects_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/class_selection');?>"><img class="nav-links pull-right" alt="Classes Info" src="<?php echo base_url('images/classes_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/school_info');?>"><img class="nav-links pull-right" alt="General Info" src="<?php echo base_url('images/school_info_thumb.png');?>" /></a>
    
    <hr/>
    <div id="body">
        <form name="class_numbers" action="<?php echo base_url('index.php/TimeTable/class_selection');?>" method="post" >
            <br/>
            <h4 class="div-title open-title"><i class="icon-minus-sign icon-white"></i>Select Classes</h4>
            <div class="from_to_selection div-flap">
                <p class="span6">
                    Enter class from  
                    <select name="class_from" id ="class_from" class="span1"></select>
                    &nbsp;&nbsp;&nbsp;&nbsp;Enter class to 
                    <select name="class_to" id ="class_to" class="span1"></select>
                    &nbsp;&nbsp;&nbsp;<input type="submit" name="class_info_submit" value="Submit Information" class="span2 btn btn-info submit"/>
                    &nbsp;&nbsp;&nbsp;<span class="error"><?php if(isset($error_message)) echo $error_message;?></span>
                </p>
                <div class="select_class span6 hide">
                    <p class="span5">
                        Select class for detailed information
                        <select name="selected_class" id ="selected_class" class="span2"></select>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
        
            <div class="carpet clearfix">
                <form name="class_info">
                    <h4><i class="icon-hand-right" ></i>Class 1</h4>
                    <hr/>
                    <p class="span12">
                        Enter number of sections
                        <select name="selected_section" id ="selected_section" class="span1"></select>
                    </p>
                </form>
            </div>
                        
    </div>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
    
    
    
</div>

</body>

</html>
