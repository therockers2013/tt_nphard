<?php include("templates/header.php"); ?>

<style>
    input[type="submit"]
    {
        margin-bottom: 9px;
    }
    hr
    {
        clear:both;
        float:none;
        border-bottom-color: #c6c6c6;
    }
    .error
    {
        color: #c43c35;
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
        
        jQuery("#myTab a").click(function()
        {
                    var idno = jQuery(this).index();
                    jQuery(this).tab('show');   
        });
        
    });
</script>

<div id="container">
    <h1>Select Number of Classes</h1>

    <div id="body">
        <form name="class_info" action="<?php echo base_url('index.php/TimeTable/class_selection');?>" method="post" >
            <br/>
            <p class="span12">
                Enter class from  
                <select name="class_from" id ="class_from" class="span1"></select>
                &nbsp;&nbsp;&nbsp;&nbsp;Enter class to 
                <select name="class_to" id ="class_to" class="span1"></select>
                &nbsp;&nbsp;&nbsp;<input type="submit" name="class_info_submit" value="Submit Information" class="span2 btn btn-info submit"/>
                &nbsp;&nbsp;&nbsp;<span class="error"><?php if(isset($error_message)) echo $error_message;?></span>
            </p>
            <hr/>
            <div class="select_class hide">
                <p class="span12">
                    Enter detailed information for class
                    <select name="selected_class" id ="selected_class" class="span1"></select>
                </p>
                <p class="span12">
                    Enter number of sections
                    <select name="selected_section" id ="selected_section" class="span1"></select>
                </p>
                
            </div>
            <hr/>
            <div class="class_info">
                
            </div>

        </form>
    </div>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
    
    
    
</div>

</body>

</html>
