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
    <h1>Subjects Information</h1>

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
                                <label class="radio inline" for="lecture_opt"> 
                                    <input type="radio" id="lecture_opt" value="l" /> Lecture
                                </label>
                                <label class="radio inline span2" for="practical_opt"> 
                                    <input type="radio" id="practical_opt" value="p" /> Practical / Others
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Minimum hrs. / week </label>
                        <div class="controls">
                          <select name="min_hrs" class="span2">
                              <?php 
                                for($i=1; $i<15; $i++)
                                {
                                    echo '<option value='.$i.'>'.$i.'</option>';
                                }
                              ?>
                          </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Select multiple rooms for multiple subjects <span class="small">(Hold Ctrl key and select)</span></label>
                        <div class="controls">
                          <select name="" class="span2" multiple="multiple">
                              <?php 
                                for($i=1; $i<15; $i++)
                                {
                                    echo '<option value='.$i.'>'.$i.'</option>';
                                }
                              ?>
                          </select>
                        </div>
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