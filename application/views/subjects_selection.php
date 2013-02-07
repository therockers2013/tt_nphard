<?php include("templates/header.php"); ?>

<style>
    form[name="select_option_form"] label
    {
        margin-left: 10px;
    }
    span.small
    {
        font-size: 11px;
        color: #646464;
    }
</style>

<script>
    
</script>


<div id="container">
    <h1 class="span5">Subjects Information</h1>
    <a href="<?php echo base_url('index.php/TimeTable/rooms');?>"><img class="nav-links pull-right" alt="Teachers Info" src="<?php echo base_url('images/teachers_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/rooms');?>"><img class="nav-links pull-right" alt="Rooms Info" src="<?php echo base_url('images/rooms_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/subjects_selection');?>"><img class="nav-links pull-right" alt="Subjects Info" src="<?php echo base_url('images/subjects_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/class_selection');?>"><img class="nav-links pull-right" alt="Classes Info" src="<?php echo base_url('images/classes_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/school_info');?>"><img class="nav-links pull-right" alt="General Info" src="<?php echo base_url('images/school_info_thumb.png');?>" /></a>
    
    <hr/>
    <div id="body">
        <form name="select_option_form" action="<?php echo base_url('index.php/TimeTable/class_selection');?>" method="post" class="clearfix">
            <br/>
                <label class="radio inline span2">
                  <input type="radio" id="add_subject" value="option1" checked> Add <u>subject</u> to database
                </label>
                <label class="radio inline span2">
                  <input type="radio" id="add_group" value="option2"> Add a <u>group</u> of subjects
                </label>
                <label class="radio inline span2">
                  <input type="radio" id="edit_subject" value="option3"> <u>Edit</u> Subject
                </label>
        </form>

        <div class="carpet clearfix">
            <form name="new_subject_form" action="<?php echo base_url('index.php/TimeTable/new_subject');?>" method="post" class="clearfix form-horizontal">

                    <h4><i class="icon-hand-right" ></i>Subject Details Form</h4>
                    <hr/>
                    <div class="control-group">
                        <label class="control-label" for="name">Subject Name</label>
                        <div class="controls">
                          <input type="text" class="span2" id="name" name="name" placeholder="e.g. Science">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Short Code</label>
                        <div class="controls">
                          <input type="text" class="span2" id="short_code" name="short_code" placeholder="e.g. SCI">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-group">
                            <label class="control-label">Subject Type</label>
                            <div class="controls">
                                                     
                                <label class="radio inline span2" style="margin-left:0" for="practical_opt"> 
                                    <input type="radio" id="practical_opt" value="p" /> Practical / Others
                                </label>
                                
                                
                                
                                <label class="radio inline" style="margin-left:0" for="lecture_opt"> 
                                    <input type="radio" id="lecture_opt" value="l" /> Lecture
                                </label>
                     <?php if($rooms_info==NULL): ?>
                                    <p style="margin-top:10px;"> <a href="<?php echo base_url('index.php/TimeTable/rooms')?>" target="_blank">Add multiple rooms for multiple practical</a></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="control-group">
                        <label class="control-label">Minimum hrs. / week </label>
                        <div class="controls">
                          <select name="min_hrs" class="span2">
                              < ?php 
                                for($i=1; $i<15; $i++)
                                {
                                    echo '<option value='.$i.'>'.$i.'</option>';
                                }
                              ?>
                          </select>
                        </div>
                    </div> -->

                    <div class="control-group rooms_div hide">
                        <?php if($rooms_info!=NULL): ?>
                                <label class="control-label">Select multiple rooms for multiple subjects <span class="small">(Hold Ctrl key and select)</span></label>
                                <div class="controls">

                                        <select name="" class="span2" multiple="multiple">
                                            <?php foreach($rooms_info as $room):?>
                                                <option value="<?php echo $room->cid;?>"><?php echo $room->class__room.": ".$room->section__title;?></option>
                                            <?php endforeach;?>    
                                        </select>

                                  </select>
                                </div>
                        <?php endif; ?>
                    </div>
            </form>
        </div>

        
    </div>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>


<div class="new_group_div">
    
</div>

<div class="edit_subject_div">
    
</div>



</body>

</html>