<?php include("templates/header.php"); ?>

<style>
                #container { width:960px; height:100%; margin:0 auto; position:relative }
                #main { width:960px; position:absolute; left:0; margin:85px 0 0 0; }
		h2
		{
			font-size: 1em;
			font-weight: normal;
			text-transform: uppercase;
			margin: 0;
			padding: 10px;
			background: #d4d4d4;
			border-top: 1px solid #fff;
			text-align: center;
			font: normal 10px Verdana, Arial, Helvetica, sans-serif;
		}
		h2 a
		{
			text-decoration: none;
			color: #777;
			display: block;
		}
		block > a
		{
			padding: 5px;
		}
                
                
                .block { width:148px; height:128px; float:left; margin:0 50px 0 0; }
                .last { margin-right:0; }

                /*---------------
                ZOOM DEFAULT
                ---------------*/

                .zoom { 
                    width:148px; 
                    height:128px; 
                    display:block; 
                    position:relative; 
                    overflow:hidden; 
                    border:1px solid #ddd; 
                    background:#fff url(<?php echo base_url('images/loader.gif');?>) no-repeat center;
                }

                    .zoom img { display:none }

                        .zoomOverlay {
                            position:absolute;
                            top:0; left:0;
                            bottom:0; right:0;
                            display:none;
                            background-image:url(<?php echo base_url('images/zoom.png');?>);
                            background-repeat:no-repeat;
                            background-position:center;
                        }

	</style>
    <script>
        $(function() {
        
            $('.blue').hoverZoom(); // Default
            
            $('.yellow').hoverZoom({
                overlayColor: '#bda62e'
            });
			
            $('.green').hoverZoom({
                overlayColor: '#a6bd2e'
            });
			
            $('.pink').hoverZoom({
                overlayColor: '#c7358c'
            });
			
            $('.purple').hoverZoom({
                overlayColor: '#a046d2'
            });
            
            /* USAGE
            
            $('#pink').hoverZoom({
                overlay: true, // false to turn off (default true)
                overlayColor: '#2e9dbd', // overlay background color
                overlayOpacity: 0.7, // overlay opacity
                zoom: 25, // amount to zoom (px)
                speed: 300 // speed of the hover
            });
            
            */
            
        }); 
    </script>


    <div id="container">
        <div id="main" class="span12">

            <div class="block">
                <a href="<?php echo base_url('index.php/welcome/school_info');?>" class="zoom blue"><img src="<?php echo base_url('images/school_info.png');?>" alt="thumbnail" /></a>
				<h2><a href="<?php echo base_url('index.php/welcome/school_info');?>">School Info</a></h2>
            </div>

            <div class="block">
                <a href="<?php echo base_url('index.php/welcome/class_selection');?>" class="zoom yellow"><img src="<?php echo base_url('images/classes.png');?>" alt="thumbnail" /></a>
				<h2><a href="<?php echo base_url('index.php/welcome/class_selection');?>">Classes Info</a></h2>
            </div>

            <div class="block">
                <a href="<?php echo base_url('index.php/welcome/subjects_selection');?>" class="zoom green"><img src="<?php echo base_url('images/subjects.png');?>" alt="thumbnail" /></a>
				<h2><a href="<?php echo base_url('index.php/welcome/subjects_selection');?>">Subjects Info</a></h2>
            </div>
			
            <div class="block">
                <a href="#" class="zoom pink"><img src="<?php echo base_url('images/teachers.png');?>" alt="thumbnail" /></a>
				<h2><a href="#">Teachers Info</a></h2>
            </div>
			
            <div class="block last">
                <a href="#" class="zoom purple"><img src="<?php echo base_url('images/rooms.png');?>" alt="thumbnail" /></a>
				<h2><a href="#">Rooms Info</a></h2>
            </div>
	</div>
    </div>

</body>
</html>