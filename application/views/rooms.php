<?php include("templates/header.php"); ?>

<style>
    
</style>

<script>
    jQuery(document).ready(function()
    {
        $("#room_no").focus();
        if(jQuery.trim(jQuery('input[name="room_id"]').attr('value'))!="")
            {
                jQuery('input[name="submit_room"]').hide();
                jQuery('input[name="save_room"]').show();
            }
        jQuery('.edit_tool').click(function(){
           var idno = jQuery('.edit_tool').index(this);
           jQuery('input[name="room_id"]').attr('value',jQuery.trim(jQuery('.room_id').eq(idno).text()));
           jQuery('input[name="room_no"]').attr('value',jQuery.trim(jQuery('.room_no').eq(idno).text()));
           jQuery('input[name="room_title"]').attr('value',jQuery.trim(jQuery('.room_title').eq(idno).text()));
           jQuery('input[name="submit_room"]').hide();
           jQuery('input[name="save_room"]').show();
        });
        
        jQuery('.remove_tool').click(function(){
            if(!confirm('Are you sure!! Do you really want to remove this room?'))
                return false;
            var idno = jQuery('.remove_tool').index(this);
            var dataString = 'room_id=' + jQuery.trim(jQuery('.room_id').eq(idno).text());
            jQuery.ajax
                    ({
                    type: "POST",
                    url: "<?php echo base_url('index.php/TimeTable/remove_room');?>",
                    data: dataString,
                    cache: false,
                    success: function(data)
                        {
                            if(data)
                                alert("Room Removed Successfully")
                            else
                                alert("Room not found");
                            
                            window.location = '<?php echo base_url('index.php/TimeTable/rooms');?>';
                        }
                    });
            return false;
        });
    });
</script>


<div id="container">
    <h1 class="span5">Rooms Information</h1>
    
    <a href="<?php echo base_url('index.php/TimeTable/rooms');?>"><img class="nav-links pull-right" alt="Teachers Info" src="<?php echo base_url('images/teachers_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/rooms');?>"><img class="nav-links pull-right" alt="Rooms Info" src="<?php echo base_url('images/rooms_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/subjects_selection');?>"><img class="nav-links pull-right" alt="Subjects Info" src="<?php echo base_url('images/subjects_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/class_selection');?>"><img class="nav-links pull-right" alt="Classes Info" src="<?php echo base_url('images/classes_thumb.png');?>" /></a>
    <a href="<?php echo base_url('index.php/TimeTable/school_info');?>"><img class="nav-links pull-right" alt="General Info" src="<?php echo base_url('images/school_info_thumb.png');?>" /></a>
    
    <hr/>
    <div id="body">
        <?php if(isset($success)): ?>
        <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">×</button>
             <?php echo $success; ?>
        </div>
        <?php endif;?>
        
        <?php if(isset($failure)):?>
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $failure; ?>
        </div>
        <?php endif;?>
        <div class="clearfix"></div>
        <div class="span5">
            <form name="rooms_form" action="<?php echo base_url('index.php/TimeTable/rooms');?>" method="post" class="clearfix form-horizontal">
                  <br/>
                  <div class="control-group">
                    <label class="control-label" for="room_no">Room Number</label>
                    <div class="controls">
                      <input type="text" id="room_no" name="room_no" placeholder="e.g. 501A" value="<?php if(!isset($success)) echo set_value('room_no'); ?>"/>
                      <?php echo form_error('room_no', '<span class="error">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="room_title">Room Title</label>
                    <div class="controls">
                      <input type="text" id="room_title" name="room_title" placeholder="e.g. Chemistry Lab" value="<?php if(!isset($success)) echo set_value('room_title'); ?>"/>
                      <?php echo form_error('room_title', '<span class="error">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" class="btn" name="submit_room" value="Add New Room" />
                      <input type="text" class="hide" name="room_id" value="<?php if(!isset($success)) echo set_value('room_id'); ?>" />
                      <input type="submit" class="btn hide" name="save_room" value="Save Room" />
                      
                    </div>
                  </div>
            </form>
        </div>
        <div class="span6">
            <table class="table-striped table">
                <tr>
                  <th>Room Number</th>
                  <th>Room Title</th>
                  <th>Actions</th>
                </tr>
                <?php if($rooms_info==NULL): ?>
                          <tr><td>No Information Present Currently</td></tr>
                      <?php else: ?>
                      <?php foreach($rooms_info as $room):?>
                                <tr>
                                   <td class="room_id hide">
                                     <?php echo $room->cid?>
                                   </td>
                                   <td class="room_no">
                                     <?php echo $room->class__room?>
                                   </td>
                                   <td class="room_title">
                                     <?php echo $room->section__title?>
                                   </td>
                                   <td>
                                       <span><i class="icon-edit edit_tool" style="cursor:pointer;"></i></span>&nbsp;&nbsp;
                                       <span><i class="icon-remove remove_tool" style="cursor:pointer;"></i></span>
                                   </td>
                                </tr>   
                       <?php endforeach; ?>
                <?php endif; ?>   
                      
                
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>

</html>