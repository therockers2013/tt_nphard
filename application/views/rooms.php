<?php include("templates/header.php"); ?>

<style>
    
</style>

<script>
    
</script>


<div id="container">
    <h1>Rooms Information</h1>

    <div id="body">
        <div class="span5">
            <form name="rooms_form" action="<?php echo base_url('index.php/TimeTable/room_info');?>" method="post" class="clearfix form-horizontal">
                  <br/>
                  <div class="control-group">
                    <label class="control-label" for="room_no">Room Number</label>
                    <div class="controls">
                      <input type="text" id="room_no" placeholder="e.g. 501A" value="<?php echo set_value('room_no'); ?>"/>
                      <?php echo form_error('room_no', '<span class="error">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="room_title">Room Title</label>
                    <div class="controls">
                      <input type="text" id="room_title" placeholder="e.g. Chemistry Lab" value="<?php echo set_value('room_title'); ?>"/>
                      <?php echo form_error('room_title', '<span class="error">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" class="btn" name="submit_room" value="Add Room" />
                      <span class="error"><?php echo $this->session->flashdata('error_message'); ?></span>
                      <span class="success"><?php echo $this->session->flashdata('success'); ?></span>
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
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>

</html>